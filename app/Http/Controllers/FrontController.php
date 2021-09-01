<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class FrontController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('welcome',compact('productos'));
    }
}