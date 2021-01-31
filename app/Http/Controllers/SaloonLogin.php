<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Auth;

class SaloonLogin extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    protected function index(Request $req){
        return view('saloon.dashboard', [
            'saloon' => User::findOrFail(Auth::id()),
            'current' => Order::where([['user_id', Auth::id()],['status', 0]])->limit(1)->get(),
            'queue' => Order::where([['user_id', Auth::id()],['status', 0]])->offset(1)->limit(10)->get(),
            'queue_count' => Order::where([['user_id', Auth::id()], ['status', 0]])->count(),
            'pending' => Order::where([['user_id', Auth::id()], ['status', 2]])->get()
        ]);
    }
    protected function done(Request $req, $id){
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        return redirect()->back();
    }
    protected function pending(Request $req, $id){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->back();
    }
    protected function remove(Request $req, $id){
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return redirect()->back();
    }
    protected function profile(Request $req){
        return view('saloon.profile', ['saloon'=> User::find(Auth::id())]);
    }
    protected function profile_update(Request $req){
        $user = User::find(Auth::id());
        $user->name = $req->name;
        $user->contact = $req->contact;
        $user->location = $req->location;
        $user->price = $req->price;
        $user->description = $req->description;
        $user->save();
        return redirect()->back();
    }
    protected function profile_logo_update(Request $req){
        $req->validate([
            'logo' => 'required'
        ]);
        $filename = time().".".$req->logo->extension();
        $req->logo->move(public_path('logo/'),$filename);
        $user = User::find(Auth::id());
        $user->logo = $filename;
        $user->save();
        return redirect()->back();
    }
    protected function setting(){
        return view('saloon.setting', ['saloon'=> User::find(Auth::id())]);
    }
    protected function isonline(){
        $saloon = User::find(Auth::id());
        if($saloon->getOrder==FALSE){
            $saloon->getOrder = True;
        }
        else{
            $saloon->getOrder = FALSE;
        }
        $saloon->save();
        return redirect()->back();
    }
}
