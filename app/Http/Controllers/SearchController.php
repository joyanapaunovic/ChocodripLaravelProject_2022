<?php

namespace App\Http\Controllers;

use App\Models\Chocolate;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function searchInput(Request $request){
        $searchValue = $request->searchValueInput;
//        return $searchValue;
        $chocolateModel = new Chocolate();
//        if($request->filled('searchValueInput')){
            $search = $chocolateModel->search($searchValue);
            return $search;
//        }
//        else {
//            $initial = $chocolateModel->getAllChocolatesFromDB();
//            return $initial;
//        }
    }
}
