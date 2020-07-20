<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;
use App\Book;
use App\Reservation;

class CheckoutBookTest extends TestCase
{
    use RefreshDatabase;

    public function test_book_can_be_checkout_by_logged_user()
    {
        $this->actingAs($user = factory(User::class)->create());

        $book = factory(Book::class)->create();

        $this->post('/checkout/'.$book->id);

        $reservations = Reservation::all();

        $this->assertCount(1, $reservations);
        $this->assertEquals($user->id, $reservations->first()->user_id);
        $this->assertEquals($book->id, $reservations->first()->book_id);
        $this->assertEquals(now(), $reservations->first()->check_out_at);
        $this->assertNull($reservations->first()->check_in_at);
    }

    public function test_book_cannot_be_checkout_by_unlogged_user()
    {
        $book = factory(Book::class)->create();

        $this->post('/checkout/'.$book->id)
            ->assertRedirect('/login');
        $this->assertCount(0, Reservation::all());
    }

    public function test_book_can_be_checkin_by_logged_user()
    {
        $this->actingAs($user = factory(User::class)->create());

        $book = factory(Book::class)->create();

        $this->post('/checkout/'.$book->id);
        $checkoutTime = now();
        sleep(1);

        $this->post('/checkin/'.$book->id);
        $checkinTime = now();

        $reservations = Reservation::all();

        $this->assertCount(1, $reservations);
        $this->assertEquals($user->id, $reservations->first()->user_id);
        $this->assertEquals($book->id, $reservations->first()->book_id);
        $this->assertEquals($checkoutTime, $reservations->first()->check_out_at);
        $this->assertEquals($checkinTime, $reservations->first()->check_in_at);
    }

    public function test_book_cannot_be_checkin_by_unlogged_user()
    {
        $book = factory(Book::class)->create();

        $this->actingAs($user = factory(User::class)->create())
            ->post('/checkout/'.$book->id);

        Auth::logout();
        $this->post('/checkin/'.$book->id)
            ->assertRedirect('/login');

        $this->assertCount(1, Reservation::all());
        $this->assertNull(Reservation::first()->check_in_at);
    }

    public function test_book_who_doesnt_exist_cannot_be_checked_out()
    {
        $this->actingAs($user = factory(User::class)->create())
            ->post('/checkout/1')
            ->assertStatus(404);

        $this->assertCount(0, Reservation::all());
    }
}
