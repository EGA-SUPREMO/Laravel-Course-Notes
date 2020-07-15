<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Author;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_author_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/authors', [
            'name' => 'Good author',
            'birth' => 'Don Reveron',
        ]);

        $response->assertRedirect(Author::first()->path());
        $this->assertCount(1, Author::all());
    }

    public function test_name_is_required()
    {
        $response = $this->post('/authors', [
            'name' => '',
            'birth' => 'Don Reveron',
        ]);

        $response->assertSessionHasErrors('name');
    }
    public function test_birth_is_required()
    {
        $response = $this->post('/authors', [
            'name' => 'Good author',
            'birth' => '',
        ]);

        $response->assertSessionHasErrors('birth');
    }

    public function test_author_can_be_edited()
    {
        $this->withoutExceptionHandling();

        $this->post('/authors', [
            'name' => 'Good author',
            'birth' => 'Don Reveron',
        ]);

        $response = $this->patch('/authors/'.Author::first()->id, [
            'name' => 'New Name',
            'birth' => 'Ernesto',
        ]);

        $response->assertRedirect(Author::first()->path());

        $this->assertEquals('New Name', Author::first()->name);
        $this->assertEquals('Ernesto', Author::first()->birth);
    }

    public function test_author_can_be_deleted()
    {
        $this->post('/authors', [
            'name' => 'Good author',
            'birth' => 'Don Reveron',
        ]);

        $this->assertCount(1, Author::all());

        $response = $this->delete('/authors/'.Author::first()->id);

        $this->assertCount(0, Author::all());
        $response->assertRedirect('/authors');

    }
}
