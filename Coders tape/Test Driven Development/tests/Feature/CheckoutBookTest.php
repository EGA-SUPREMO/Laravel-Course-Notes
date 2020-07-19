<?php

namespace Tests\Feature;

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
}
