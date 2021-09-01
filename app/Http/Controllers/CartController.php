<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    public function add(Request $request){
        $product = Product::find($request->$id);
        Cart::add(
            $product -> id,
            $product -> name,
            $product -> price,
            1,
            array("urlimagen"=>$product->image)
        );
        //return redirect('/productos')->with('success',"$producto->nombre Se ha 
        //agregado con exito al carrito de compra!");
        return back()->with('success',"$product->name se ha agregado con exito al carrito!");
    }

    public function removeItem(Request $request){
        //$producto = Producto::where('id',$request->id)->firstOrFail();
        Cart::remove([
            'id'=> $request ->id,
        ]);
        return back()->with('success',"Producto eliminado con exito de su carrito");
    }
}