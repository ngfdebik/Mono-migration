<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;


    public static function getRandomUserId(){
        return DB::table('users')
                ->select('id')
                ->inRandomOrder()
                ->first();
    }

    public static function getUserByReviews()
    {
        return DB::select('select u.name from users as u 
        join reviews as r on u.id = r.user_id 
        join products as p on r.product_id = p.id 
        join ratings as rat on u.id = rat.user_id 
        where (select count(*) from reviews where user_id = u.id) > 10 and 
        p.price > 3000 and 
        (select sum(rating)/count(*) from ratings where u.id = ratings.user_id) > 4 
        group by name');
    }
}
