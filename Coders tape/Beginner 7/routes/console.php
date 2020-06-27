<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\User;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
Artisan::command('user:clean-up', function () {
	$this->info('Cleanning for you :)');
    User::whereDoesntHave('questionnaires')
    	->get()
    	->each(function ($user)
    	{
    		$user->delete();

    		$this->warn($user->name.' was deleted, hope you are now happy, you dream-breaker!');
    	});
})->describe('Clean every user who doesn\'t have an questionnaire.');
