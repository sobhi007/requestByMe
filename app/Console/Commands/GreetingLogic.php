<?php

namespace App\Console\Commands;

use App\Mail\Greeting;
use App\User;
use Illuminate\Console\Command;

class GreetingLogic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'greeting:good';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'say anything';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $accounts = User::get(['email', 'name']);
        $users = $accounts->toArray();
        foreach ($users as $user) {
            Mail::to($user['email'])->send(new Greeting($user['name']));
        }

    }
}
