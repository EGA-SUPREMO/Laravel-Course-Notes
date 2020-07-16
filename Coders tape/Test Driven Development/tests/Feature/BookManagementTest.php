<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Book;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_book_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', $this->data());

        $response->assertRedirect(Book::first()->path());
        $this->assertCount(1, Book::all());
    }

    public function test_title_is_required()
    {
        $response = $this->post('/books', array_merge($this->data(), [
            'title' => '',
        ]));

        $response->assertSessionHasErrors('title');
    }
    public function test_author_is_required()
    {
        $response = $this->post('/books', array_merge($this->data(), [
            'author' => '',
        ]));

        $response->assertSessionHasErrors('author');
    }

    public function test_book_can_be_edited()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', $this->data());

        $response = $this->patch('/books/'.Book::first()->id, [
            'title' => 'New Title',
            'author' => 'Ernesto',
        ]);

        $response->assertRedirect(Book::first()->path());

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('Ernesto', Book::first()->author);
    }

    public function test_book_can_be_deleted()
    {
        $this->post('/books', $this->data());

        $this->assertCount(1, Book::all());

        $response = $this->delete('/books/'.Book::first()->id);

        $this->assertCount(0, Book::all());
        $response->assertRedirect('/books');

    }

    private function data()
    {
        return [
            'title' => 'Good book',
            'author' => 'Don Reveron',
        ];
    }
}
