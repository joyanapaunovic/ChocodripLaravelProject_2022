<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        return view('users.cart');
    }

    public function add_to_cart(Request $request){

//        dd(session()->get('cartItems'));
//        dd($request->quantity);
//        dd($request->productId);
//        return $request;

//        return $quantity;

        $cartItems = session()->get('cartItems');
        if(!$cartItems){
            $cartItems = [];
        }

        $existingIndex = null;
        foreach($cartItems as $index => $item){
            if($item->product->id == $request->productId){
                $existingIndex = $index; // 0 1 2
                break;
            }
        }
        if($existingIndex !== null){
            if($request->quantity > 1){
                $cartItems[$existingIndex]->quantity =  $cartItems[$existingIndex]->quantity + $request->quantity;
            }
            else {
                $cartItems[$existingIndex]->quantity++;
            }

        }
        else {
            $whereId = DB::table('chocolates')
                ->join('categories', 'chocolates.category_id', '=', 'categories.id')
                ->where('chocolates.id', '=', $request->productId)
                ->first();
            $cartItem = new \stdClass();
            $cartItem->quantity = $request->quantity;
            $cartItem->product = $whereId;
            array_push($cartItems, $cartItem);
            session()->put('cartItems', $cartItems);
        }


//



        return response()->json([], 200);



    }


    public function delivered(AddressRequest $request){
        $address = $request->input('address');
        try {
            if(session()->has('cartItems')){
                foreach(session()->get('cartItems') as $cartItem){
                        $quantity = $cartItem->quantity;
                        $productId = $cartItem->product->id;
                    }
                if(session()->has('user')){
                        $firstName = session()->get('user')->first_name;
//                        dd($firstName);
                        $idUser = session()->get('user')->id;
                        $lastName = session()->get('user')->last_name;
                }
                DB::beginTransaction();
                DB::table('cart')->insert([
                    'id_chocolate' => $productId,
                    'id_user' => $idUser,
                    'quantity' => $quantity,
                    'user_address' => $address,
                    'first_name_cart' => $firstName,
                    'last_name_cart' => $lastName
                ]);
                DB::commit();
            }
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error-msg', $e->getMessage());
        }
       if(session()->has('cartItems')){
           session()->forget('cartItems');
       }
        return redirect()->back();
    }

}
