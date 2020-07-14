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

    public function testQuestionnaireCanBeAddedThroughTheForm()
    {
        Event::fake();

        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/questionnaires', [
            'title' => 'good to go',
            'purpose' => 'going to good',
        ]);

        $this->assertCount(1, Questionnaire::all());
    }
    public function testTitleIsRequired()
    {
        Event::fake();

        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/questionnaires', [
            'title' => '',
            'purpose' => 'going to good',
        ]);

        $response->assertSessionHasErrors('title');
        $this->assertCount(0, Questionnaire::all());
    }
    public function testPurposeIsRequired()
    {
        Event::fake();

        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/questionnaires', [
            'title' => 'good to go',
            'purpose' => '',
        ]);

        $response->assertSessionHasErrors('purpose');
        $this->assertCount(0, Questionnaire::all());
    }

}
