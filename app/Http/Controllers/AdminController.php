<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Chocolate;
use App\Models\Message;
use App\Models\UserDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\Input;

class AdminController extends BaseController
{
    public function index(){
        return view('admin.admin');
    }
    //tables
    public function tables(){
        $model = new Chocolate();
        $chocolates = $model->getAllChocolatesFromDB();
        $categoryModel = new Category();
        $categories = $categoryModel->fetchCategoriesFromDB();
        $messageModel = new Message();
        $messages = $messageModel->getMessages();
        $userModel = new UserDB();
        $users = $userModel->getAllUsers();
        $cartModel = new Cart();
        $orders = $cartModel->getFromCart();
        return view('admin.tables', [
            'data' => $this->data,
            'chocolates' => $chocolates,
            'categories' => $categories,
            'messages' => $messages,
            'users' => $users,
            'orders' => $orders
        ]);
    }
    // forms
    public function forms(){
        $categoryModel = new Category();
        $this->data['categories'] = $categoryModel->fetchCategoriesFromDB();
        return view('admin.forms', ['data' => $this->data]);
    }
    // INSERT
    public function store(AddProductRequest $request){
        $name = $request->input('name');
        $desc = $request->input('desc');
        $ingredients = $request->input('ingredients');
        $nutritionValues = $request->input('nutritionValues');
        $category = $request->input('category');
        $previousPrice = $request->input('previousPrice');
        $currentPrice = $request->input('currentPrice');
        $photo = time() . "._chocolate" . "." . $request->file('photo')->extension();
        $available = $request->input('availability');
        // dd($photo);
        try {
            DB::beginTransaction();
            $request->photo->move(public_path('images/'), $photo);
            if($previousPrice != NULL) {
                DB::table('chocolates')
                    ->insert([
                        'name' => $name,
                        'description' => $desc,
                        'ingredients' => $ingredients,
                        'nutrition_values' => $nutritionValues,
                        'src_picture' => $photo,
                        'previous_price' => $previousPrice,
                        'current_price' => $currentPrice,
                        'category_id' => $category,
                        'available' => $available
                    ]);
            } else {
                DB::table('chocolates')
                    ->insert([
                        'name' => $name,
                        'description' => $desc,
                        'ingredients' => $ingredients,
                        'nutrition_values' => $nutritionValues,
                        'src_picture' => $photo,
                        'previous_price' => NULL,
                        'current_price' => $currentPrice,
                        'category_id' => $category,
                        'available' => $available
                    ]);
            }
            DB::commit();
            return redirect()->back()->with('success-msg', "Successfully added a product.");
        }
        catch(Exception $e){
            DB::rollBack();
            if(File::exists(public_path('images/' . $photo))){
                File::delete(public_path('images/' . $photo));
            }
            return redirect()->back()->with('error-msg', $e->getMessage());
        }


    }

    // DELETE
    public function destroy($id){
//        return $id;
        try{
            $chocolateModel = new Chocolate();
            $delete = $chocolateModel->deleteChocolate($id);
            return redirect()->back();
        }
        catch(\Exception $ex){
            Log::error($ex->getMessage());
        }
    }

    // users - log file
//    public function users(){
//        $logFile = file_get_contents(storage_path() .'/logs/laravel.log');
//        $logData = [];
//        $logFile = explode('\n', $logFile);
//        foreach ($logFile as $key => $value) {
////            $logData[] = array('line'=> $line_num, 'content'=> htmlspecialchars($line));
//            $logData[] = explode('\n', $value);
//        }
//        dd($logData);
//
//    }

    // SHOW UPDATE FORM
    public function edit($id){
        $chocolate = new Chocolate();
        $getChocolate = $chocolate->getOneChocolateByThisId($id);
        $categories = new Category();
        $getAllCategories = $categories->fetchCategoriesFromDB();
        return view('admin.update-form',
            [
            'chocolate' => $getChocolate,
            'categories' => $getAllCategories,
                'data' => $this->data
        ]
        );
    }

    // UPDATE
    public function update($id, UpdateFormRequest $request){

        try{
            //        dd($id);
            //        dd($request->all());
            $name = $request->input('name');
            $desc = $request->input('desc');
            $ingredients = $request->input('ingredients');
            $nutritionValues = $request->input('nutritionValues');
            $category = $request->input('category');
            $previousPrice = $request->input('previousPrice');
            $currentPrice = $request->input('currentPrice');
            $photo = $request->file('photo');
            $available = $request->input('availability');
            //        dd($photo);
            if($photo === NULL){
                $query = DB::table('chocolates')
                    ->where('chocolates.id', '=', $id)
                    ->update(
                        [
                            'name' => $name,
                            'description' => $desc,
                            'ingredients' => $ingredients,
                            'nutrition_values' => $nutritionValues,
                            'previous_price' => $previousPrice,
                            'current_price' => $currentPrice,
                            'category_id' => $category,
                            'available' => $available
                        ]);
                return redirect()->back()->with('success-msg', "You've successfully updated this product.");
            }
            else {
                $photo = time() . "._chocolate" . "." . $request->file('photo')->extension();
                $request->photo->move(public_path('images/'), $photoNew);
                $query = DB::table('chocolates')
                    ->where('chocolates.id', '=', $id)
                    ->update(
                        [
                            'name' => $name,
                            'description' => $desc,
                            'ingredients' => $ingredients,
                            'nutrition_values' => $nutritionValues,
                            'src_picture' => $photo,
                            'previous_price' => $previousPrice,
                            'current_price' => $currentPrice,
                            'category_id' => $category,
                            'available' => $available
                        ]);
                return redirect()->back()->with('success-msg', "You've successfully updated this product.");
            }
        }
        catch(\Exception $ex){
            if(File::exists(public_path('images/' . $photo))){
                File::delete(public_path('images/' . $photo));
            }
            return redirect()->back()->with('error-msg', $ex->getMessage());
        }

    }
}
