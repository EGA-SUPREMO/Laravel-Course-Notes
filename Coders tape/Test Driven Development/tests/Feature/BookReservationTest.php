<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Book;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testBookCanBeAdded()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'Good book',
            'author' => 'Don Reveron',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }
}
