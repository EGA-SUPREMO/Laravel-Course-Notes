<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\User;

class QuestionnaireTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     * 
     * @return void
     */
    public function testUnloggedUserGoesToLoginPageWhenAccessingToQuestionnaireIndex()
    {
        $response = $this->get('/questionnaires')
            ->assertRedirect('/login');
    }
    public function testLoggedUserAccessToQuestionnaireIndex()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/questionnaires');

        $response->assertOk();
    }
}
