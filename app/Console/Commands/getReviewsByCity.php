<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Review;

class getReviewsByCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-reviews-by-city';

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
        $reviews = Review::getReviewsByCity();

        $fp = fopen('C:\Users\skiff\Desktop\Mono_Laravel\mono_migration\public\ReviewsByCity.csv', 'w');

        foreach($reviews as $review)
        {
            fputcsv($fp, (array)$review);
        }
        fclose($fp);
    }
}
