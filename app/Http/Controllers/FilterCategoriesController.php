<?php

namespace App\Http\Controllers;

use App\Models\Chocolate;
use Illuminate\Http\Request;


class FilterCategoriesController extends BaseController
{
    // FILTER CATEGORIES
    public function getChocolatesFilter(Request $request){
        $categories = $request->checkedCategories;
//        return $categories;
        $chocolateModel = new Chocolate();

        if($request->filled('checkedCategories')){
            $getChocolatesByCheckedCategories = $chocolateModel->getChocolatesByCategory($categories);
            return response()->json($getChocolatesByCheckedCategories);
        }
        else {
            $getAllChocolates = $chocolateModel->getAllChocolatesFromDB();
            return response()->json($getAllChocolates);
        }

    }

}
