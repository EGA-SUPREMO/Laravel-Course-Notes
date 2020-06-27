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
    protected $signature = 'make:user {name=Juan Morrales Feo} {email=yourock@here.com} {password=nevermind} {--i|interactive}';

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
        if($this->option('interactive')) {
            $name = $this->ask('What\'s the name of the user?');
            $email = $this->ask('What\'s the email of the user?');
            $password = $this->ask('What\'s the password of the user?');
        }

        $user = User::create([
            'name' => $name ?? $this->argument('name'),
            'email' => $email ?? $this->argument('email'),
            'password' => $password ?? $this->argument('password'),
        ]);

        $this->info($user->name.' added successfully.');
        $this->warn('This is a nonsense warning');
        $this->error('Error, warning printed');
        $this->error('Error, broken english');
    }
}
