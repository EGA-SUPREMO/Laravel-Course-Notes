<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
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
        $response->assertCount(1,  Book::all());
    }
}
