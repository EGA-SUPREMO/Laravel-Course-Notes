<?php

namespace Tests\Feature;

use Carbon\Carbon;
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

        $response = $this->post('/authors', $this->data());

        $response->assertRedirect(Author::first()->path());
        $this->assertInstanceOf(Carbon::class, Author::first()->birth);
        $this->assertCount(1, Author::all());
    }

    public function test_name_is_required()
    {
        $response = $this->post('/authors', array_merge($this->data(), [
            'name' => '',
        ]));

        $response->assertSessionHasErrors('name');
    }
    public function test_birth_is_required()
    {
        $response = $this->post('/authors', array_merge($this->data(), [
            'birth' => '',
        ]));

        $response->assertSessionHasErrors('birth');
    }

    public function test_author_can_be_edited()
    {
        $this->withoutExceptionHandling();

        $this->post('/authors', $this->data());

        $response = $this->patch('/authors/'.Author::first()->id, [
            'name' => 'New Name',
            'birth' => '2020/01/07',
        ]);

        $response->assertRedirect(Author::first()->path());

        $this->assertEquals('New Name', Author::first()->name);
        $this->assertEquals('2020/01/07', Author::first()->birth->format('Y/m/d'));
    }

    public function test_author_can_be_deleted()
    {
        $this->post('/authors', $this->data());

        $this->assertCount(1, Author::all());

        $response = $this->delete('/authors/'.Author::first()->id);

        $this->assertCount(0, Author::all());
        $response->assertRedirect('/authors');

    }

    private function data()
    {
        return [
            'name' => 'Good author',
            'birth' => '2020/02/06',
        ];
    }
}
