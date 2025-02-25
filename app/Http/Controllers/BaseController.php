<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //
    public $data;
    public function __construct()
    {
//        $navigationModel = new Navigation();
//        $this->data['menu'] = $navigationModel->fetchNavigationLinksFromDB();
        //        var_dump($this->data['menu']);
    }
}
