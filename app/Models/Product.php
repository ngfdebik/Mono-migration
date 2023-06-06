<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function getRandomProductId(){
        return DB::table('products')
                ->select('id')
                ->inRandomOrder()
                ->first();
    }
}
