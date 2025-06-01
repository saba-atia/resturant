<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Psy\Test\Command\ListCommand\Fixtures\foo;

class AdminController extends Controller
{
    
    public function users()
{
    $data = User::all();
    return view('admin.users', compact('data'));
}
    public function adminHome()
    {
        $data = User::all(); // تغيير اسم المتغير إلى $users
        return view('admin.adminhome', compact('data')); // إرسال المتغير باسم users
    }

public function deleteUser($id)
{
    User::find($id)->delete();
    return redirect()->back()->with('success', 'User deleted successfully');
}

public function deletemenu($id) // يجب إضافة $id كمعامل للدالة
{
    $data = Food::find($id);
    $data->delete();
    return redirect()->back()->with('success', 'Menu deleted successfully');
}

public function foodmenu()
{
    $data = food::all(); // Get all users
    return view('admin.foodmenu', compact("data")); // Pass data to the view
}

public function updateview($id)
{
    $data = Food::find($id);
    return view('admin.updateview', compact('data'));
}

public function update(Request $request, $id)
{
    $data = Food::find($id);

$image = $request->image;

$imagename =time() . '.' . $image->getClientOriginalExtension();
$request->image->move('foodimage', $imagename);

$data->image = $imagename;

$data->title = $request->title;

$data->price = $request->price;

$data->description = $request->description;
$data->save();
return redirect()->back();
}

public function upload(Request $request)
{
$data = new Food; 

$image = $request->image;

$imagename =time() . '.' . $image->getClientOriginalExtension();
$request->image->move('foodimage', $imagename);

$data->image = $imagename;

$data->title = $request->title;

$data->price = $request->price;

$data->description = $request->description;
$data->save();
return redirect()->back();

}



public function reservation(Request $request)
{
$data = new Reservation(); 



$data->name = $request->name;
$data->email = $request->email;
$data->phone = $request->phone;
$data->guest = $request->guest;
$data->date = $request->date;
$data->time = $request->time;
$data->message = $request->message;

$data->save();
return redirect()->back();

}

public function viewreservation(){
if(Auth::id()) 
{



    $data=reservation::all(); // Get all reservations
    return view('admin.adminreservation', compact("data")); // Pass data to the
}else{
    return redirect('login');
}
}


public function viewchef()
{
    $data= Foodchef::all(); // Get all chefs
    return view('admin.adminchef' , compact("data")); // Pass data to the view

    

}

public function uploadchef(Request $request)
{
    $data = new Foodchef(); 

    $image = $request->image;

    $imagename =time() . '.' . $image->getClientOriginalExtension();
    $request->image->move('chefimage', $imagename);

    $data->image = $imagename;

    $data->name = $request->name;
 $data->speciality = $request->speciality;
    $data->save();
    return redirect()->back();


}


public function updatechef($id)
{
    $data = Foodchef::find($id);
    return view('admin.updatechef', compact('data'));   


}


public function updatefoodchef(Request $request, $id)
{
    $data = Foodchef::find($id);
$image = $request->image;
if ($image)
{
$imagename =time() . '.' . $image->getClientOriginalExtension();
$request->image->move('chefimage', $imagename);

$data->image = $imagename;

}

$data->name = $request->name;
$data->speciality = $request->speciality;
$data->save();
return redirect()->back()->with('success', 'Chef updated successfully');

}


public function deletechef($id)
{
    $data = Foodchef::find($id);
    $data->delete();
    return redirect()->back()->with('success', 'Chef deleted successfully');








}

public function orders()
{
    $data = Order::all(); // Get all orders
    return view('admin.orders', compact("data")); // Pass data to the view


}

public function search(Request $request)
{
    $search = $request->search;
    $data = Order::where('name', 'like', '%'.$search.'%')
                ->orWhere('foodname', 'like', '%'.$search.'%')
                ->get();
    return view('admin.orders', compact("data"));
}

}