<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;
    public function getFromCart(){
        return DB::table('cart')
            ->select('users.*', 'cart.*', 'chocolates.*', 'users.id as userId')
            ->join('chocolates', 'cart.id_chocolate', '=', 'chocolates.id')
            ->join('users', 'cart.id_user', '=', 'users.id')->get();
    }
}
