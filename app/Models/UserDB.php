<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserDB extends Model
{
    use HasFactory;
    public function getAllUsers(){
        return DB::table('users')
            ->select('users.*', 'roles.*', 'users.id as userId')
            ->join('roles', 'users.id_role', '=', "roles.id")
            ->get();
    }
}
