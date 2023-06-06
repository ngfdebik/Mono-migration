<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;


    public static function getReviewsByCity()
    {
        return DB::table('reviews')
            ->select('review')
            ->join('users AS u', 'user_id', '=', 'u.id')
            ->where('city', 'Самара')
            ->orWhere('city', 'Волгоград')
            ->where('was_helpful', '>', 10)
            ->groupBy('review')
            ->get();
    }
}
