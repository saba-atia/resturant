<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use function Psy\Test\Command\ListCommand\Fixtures\foo;

class HomeController extends Controller
{
    public function index()
    {
        if( Auth::id()) {

            return redirect('redirects');
        } 
        $data=food::all();

    $data2=Foodchef::all();
        $count = 0;

        return view('home',compact('data','data2' , 'count'));
    }

public function redirects()
{

    $data=food::all();
    $data2=Foodchef::all();

$usertype = Auth::user()->usertype;
    if (Auth::user()->usertype == '1') {
        return view('admin.users', compact('data'));
    } else {

        $user_id=Auth::id();
$count= Cart::where('user_id', $user_id)->count();
        return view('home', compact('data', 'data2','count'));
    }
}


public function addcart(Request $request, $id)
{
    if (Auth::id()) {
        $user_id = Auth::id();
        $quantity = $request->quantity;
        
        // تحقق من وجود الطعام أولاً
        $food = Food::find($id);
        if(!$food) {
            return redirect()->back()->with('error', 'Food item not found');
        }

        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->food_id = $id;
        $cart->quantity = $quantity;
        $cart->save();

        return redirect()->back()->with('message', 'Food Added Successfully');
    } else {
        return redirect('/login');
    }
}

public function showcart(Request $request, $id)
{
    $count=cart::where('user_id', $id)->count();
    if (Auth::id()) {
        $data2= Cart::select('*')->where('user_id','=',$id)->get();
        $data = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        return view('showcart', compact('count', 'data','data2')); // Remove $ sign from data
    } else {
        return redirect()->back();
    }
}


public function remove($id)
{
    $data = Cart::find($id);
    $data->delete();
    return redirect()->back();


}


public function orderconfirm(Request $request)
{
foreach($request->foodname as $key => $foodname) {
        $data = new Order();
        $data->foodname = $foodname;
        $data->price = $request->price[$key];
        $data->quantity = $request->quantity[$key];
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();
    }

    return redirect()->back()->with('message', 'Order Placed Successfully');




}


}
