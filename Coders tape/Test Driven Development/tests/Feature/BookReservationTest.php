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
        ////////// the above should be reduced

        $book->checkin($user);
        $reservations = Reservation::all();

        $this->assertCount(1, $reservations);
        $this->assertEquals($user->id, $reservations->first()->user_id);
        $this->assertEquals($book->id, $reservations->first()->book_id);
        $this->assertEquals(now(), $reservations->first()->check_in_at);
    }
}
