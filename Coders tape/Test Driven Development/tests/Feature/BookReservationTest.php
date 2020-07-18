<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;
use App\Book;
use App\Reservation;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_book_can_be_checked_out()
    {
        $book = factory(Book::class)->create();
        $user = factory(User::class)->create();

        $book->checkout($user);
        $reservations = Reservation::all();

        $this->assertCount(1, $reservations);
        $this->assertEquals($user->id, $reservations->first()->user_id);
        $this->assertEquals($book->id, $reservations->first()->book_id);
        $this->assertEquals(now(), $reservations->first()->check_out_at);
        $this->assertNull($reservations->first()->check_in_at);

    }

    public function test_book_can_be_checked_in()
    {
        $book = factory(Book::class)->create();
        $user = factory(User::class)->create();

        $book->checkout($user);
        $reservations = Reservation::all();

        $this->assertCount(1, $reservations);
        $this->assertEquals($user->id, $reservations->first()->user_id);
        $this->assertEquals($book->id, $reservations->first()->book_id);
        $this->assertEquals(now(), $reservations->first()->check_out_at);
        $this->assertNull($reservations->first()->check_in_at);
        ////////// the above should be reduced

        $book->checkin($user);
        $reservations = Reservation::all();

        $this->assertCount(1, $reservations);
        $this->assertEquals($user->id, $reservations->first()->user_id);
        $this->assertEquals($book->id, $reservations->first()->book_id);
        $this->assertEquals(now(), $reservations->first()->check_in_at);
    }
    public function test_book_can_be_checkout_checked_in_twice()
    {
        $book = factory(Book::class)->create();
        $user = factory(User::class)->create();

        sleep(1);
        $book->checkout($user);
        $reservations = Reservation::all();
        $firstCheckoutDate = now();

        $this->assertCount(1, $reservations);
        $this->assertEquals($user->id, $reservations->first()->user_id);
        $this->assertEquals($book->id, $reservations->first()->book_id);
        $this->assertEquals($firstCheckoutDate, $reservations->first()->check_out_at);
        $this->assertNull($reservations->first()->check_in_at);
        ////////// the above should be reduced

        sleep(1);
        $book->checkin($user);
        $reservations = Reservation::all();
        $firstCheckinDate = now();

        $this->assertCount(1, $reservations);
        $this->assertEquals($user->id, $reservations->first()->user_id);
        $this->assertEquals($book->id, $reservations->first()->book_id);
        $this->assertEquals($firstCheckinDate, $reservations->first()->check_in_at);
        ////////// the above should be reduced TOO

        sleep(1);
        $book->checkout($user);
        $reservations = Reservation::all();

        $this->assertCount(2, $reservations);
        $this->assertEquals($user->id, $reservations->find(2)->user_id);
        $this->assertEquals($book->id, $reservations->find(2)->book_id);
        $this->assertEquals(now(), $reservations->find(2)->check_out_at);
        $this->assertEquals($firstCheckoutDate, $reservations->first()->check_out_at);
        $this->assertEquals($firstCheckinDate, $reservations->first()->check_in_at);
        $this->assertNull($reservations->find(2)->check_in_at);
        ////////// the above should be reduced

        sleep(1);
        $book->checkin($user);
        $reservations = Reservation::all();

        $this->assertCount(2, $reservations);
        $this->assertEquals($user->id, $reservations->find(2)->user_id);
        $this->assertEquals($book->id, $reservations->find(2)->book_id);
        $this->assertEquals(now(), $reservations->find(2)->check_in_at);
        $this->assertEquals($firstCheckoutDate, $reservations->first()->check_out_at);
        $this->assertEquals($firstCheckinDate, $reservations->first()->check_in_at);
    }
    public function test_book_cannot_be_checked_in_without_being_check_out_first()
    {
        $this->expectException(\Exception::class);
        $book = factory(Book::class)->create();
        $user = factory(User::class)->create();

        $book->checkin($user);
        $reservations = Reservation::all();

        $this->assertCount(0, $reservations);
    }
}
