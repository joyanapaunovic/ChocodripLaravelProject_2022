<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Navigation extends Model
{
    use HasFactory;
    public function fetchNavigationLinksFromDB(){
        return DB::table('navigation')
            ->select()
            ->get();
    }
}
