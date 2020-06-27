<?php

namespace App\Console\Commands;

use App\User;

use Illuminate\Console\Command;

class MakeUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {name=Juan Morrales Feo} {email=yourock@here.com} {password=nevermind}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new user to the users table';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => $this->argument('password'),
        ]);

        $this->info($user->name.' added successfully.');
    }
}
