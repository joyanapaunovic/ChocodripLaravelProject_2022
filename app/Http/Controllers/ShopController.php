<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chocolate;
use Illuminate\Http\Request;

class ShopController extends BaseController
{
    public function index(Request $request){
        // SELECT * categories
        $categoryModel = new Category();
        $this->data['categories'] = $categoryModel->fetchCategoriesFromDB();
        // SELECT * chocolates w categories
        $chocolateModel = new Chocolate();
        $this->data['chocolates'] = $chocolateModel->getAllChocolatesFromDB();
        // dd($this->data['search']);
        return view('pages.products.shop', [
            'data' => $this->data]);
    }

    // show single page of the product
    public function show($id){
        // return dd($id);
        $chocolateModel = new Chocolate();
        $oneChocolateResultQuery = $chocolateModel->getOneChocolateByThisId($id);
        // dd($oneChocolateResultQuery);
        return view("pages.products.single-chocolate", [
            'data' => $this->data, // menu in this case
            'oneChocolate' => $oneChocolateResultQuery
        ]);
    }
}
