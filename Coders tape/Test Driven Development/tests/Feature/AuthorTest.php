<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Author;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    public function test_birth_is_nullable()
    {
        Author::firstOrCreate([
            'name' => 'Don Reveron',
        ]);

        $this->assertCount(1, Author::all());
    }
}
