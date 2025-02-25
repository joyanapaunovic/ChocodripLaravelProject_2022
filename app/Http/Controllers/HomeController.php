<?php

namespace App\Http\Controllers;

use App\Models\Chocolate;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    //
    public function index(){
        $chocolateModel = new Chocolate();
        $this->data['chocolatesOnDiscount'] = $chocolateModel->getAllChocolatesFromDB();
        return view("pages.main.home", ['data' => $this->data]);
    }
}
