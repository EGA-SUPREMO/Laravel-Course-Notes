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
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new user to the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::create([
            'name' => '',
            'email' => '',
            'password' => '',
        ]);

        $this->info(' added successfully.');
    }
}
