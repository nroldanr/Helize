<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="user"){
                return redirect()->route('home.index');
            }
    
            return $next($request);
        });
    }

    public function index()
    {
        $data["orders"] = Order::all();
        return view('admin.order.index')->with(["data" => $data]);
    }
}