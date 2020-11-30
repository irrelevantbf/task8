<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home' , [
            "Products" => Products::get()
        ]);
        $Product=Products::where( "id" , $id)->firstOrFail();
    }
//     public function index()
//     {
//         return Auth::user()->id;
//     }
}
