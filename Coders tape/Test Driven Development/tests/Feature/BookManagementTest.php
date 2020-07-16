<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Author;
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
            'author_id' => '',
        ]));

        $response->assertSessionHasErrors('author_id');
    }

    public function test_book_can_be_edited()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', $this->data());

        $response = $this->patch('/books/'.Book::first()->id, [
            'title' => 'New Title',
            'author_id' => 'Ernesto',
        ]);

        $response->assertRedirect(Book::first()->path());

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('Ernesto', Book::first()->author_id);
    }

    public function test_book_can_be_deleted()
    {
        $this->post('/books', $this->data());

        $this->assertCount(1, Book::all());

        $response = $this->delete('/books/'.Book::first()->id);

        $this->assertCount(0, Book::all());
        $response->assertRedirect('/books');

    }

    public function test_author_is_automatally_added_when_a_new_book_is_added($value='')
    {
        $this->post('/books', $this->data());

        $this->assertCount(1, $book = Book::all());
        $this->assertCount(1, $author = Author::all());

        $this->assertEquals($author->first()->id, $book->first()->author_id);
    }

    private function data()
    {
        return [
            'title' => 'Good book',
            'author_id' => 'Don Reveron',
        ];
    }
}
