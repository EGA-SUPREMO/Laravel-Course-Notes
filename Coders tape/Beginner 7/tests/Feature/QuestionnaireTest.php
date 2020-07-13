<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

use App\User;
use App\Questionnaire;

class QuestionnaireTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        Event::fake();
    }

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
        $this->login();

        $response = $this->get('/questionnaires');

        $response->assertOk();
    }

    public function testQuestionnaireCanBeAddedThroughTheForm()
    {
        $this->withoutExceptionHandling();
        
        $this->login();

        $response = $this->post('/questionnaires', [
            'title' => 'good to go',
            'purpose' => 'going to good',
        ]);

        $this->assertCount(1, Questionnaire::all());
    }

    private function login()
    {
        $this->actingAs(factory(User::class)->create());
    }
}
