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

    public function testTitleIsRequired()
    {
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Don Reveron',
        ]);

        $response->assertSessionHasErrors('title');
    }
    public function testAuthorIsRequired()
    {
        $response = $this->post('/books', [
            'title' => 'Good book',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    public function testBookCanBeEdited()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'Good book',
            'author' => 'Don Reveron',
        ]);

        $response = $this->patch('/books/'.Book::first()->id, [
            'title' => 'New Title',
            'author' => 'Ernesto',
        ]);

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('Ernesto', Book::first()->author);
    }

    public function testBookCanBeDeleted()
    {
        $this->post('/books', [
            'title' => 'Good book',
            'author' => 'Don Reveron',
        ]);

        $this->assertCount(1, Book::all());

        $response = $this->delete('/books/'.Book::first()->id);

        $this->assertCount(0, Book::all());
    }
}
