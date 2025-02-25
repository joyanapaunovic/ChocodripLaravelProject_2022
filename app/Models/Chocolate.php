<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Chocolate extends Model
{
    use HasFactory;
    public function getAllChocolatesFromDB(){
        return DB::table('chocolates')
            ->select("chocolates.*", "categories.id AS catId", 'categories.category_name')
            ->join("categories", 'chocolates.category_id', '=', 'categories.id')
            ->get();
    }

    public function getOneChocolateByThisId($id){
        return DB::table("chocolates")
            ->select("chocolates.*", "categories.id AS catId", 'categories.category_name')
            ->join('categories', 'chocolates.category_id', '=', 'categories.id')
            ->where("chocolates.id", '=', $id)
            ->get();
    }

    public function search($searchValue)
    {
            return \Illuminate\Support\Facades\DB::table('chocolates')
            // ->select('chocolates.*', 'categories.id AS catId', 'categories.category_name');
            ->join("categories", 'chocolates.category_id', '=', 'categories.id')
            ->where("chocolates.name", 'like', '%' . $searchValue  . '%')->get();
        }
//
//
//        // PAGINACIJA
//        if($request->has('paginate')){
//            $perPage = 11;
//            $page = 1;
//
//            $query = $query->take($perPage);
//            $pageResponse = new \stdClass();
//            $pageResponse->items = $query->get();
//
//            return response()->json($pageResponse);
//
//        }
////        return $responseText ? $query->get() : $text;
//        return $query->get();
//    }


    public function getChocolatesByCategory($categoriesArray){
        return DB::table('chocolates')->join('categories', 'chocolates.category_id', '=', 'categories.id')
        ->whereIn('category_id', $categoriesArray)->get();
    }

    public function deleteChocolate($id){
        return DB::table('chocolates')->where('chocolates.id', '=', $id)->delete();
    }

}
