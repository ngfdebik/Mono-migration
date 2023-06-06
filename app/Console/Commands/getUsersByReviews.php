<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class getUsersByReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-users-by-reviews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::getUserByReviews();
        $fp = fopen('C:\Users\skiff\Desktop\Mono_Laravel\mono_migration\public\UserByReviews.csv', 'w');
        
        foreach($users as $user)
        {
            //echo(array)$user;
            fputcsv($fp, (array)$user);
        }
        fclose($fp);
    }
}
