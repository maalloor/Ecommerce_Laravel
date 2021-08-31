<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Producto;

class CartController extends Controller
{
    public function add(Request $request){
        $producto = Producto::find($request->$producto_id);
        Cart::add(
            $producto -> id,
            $producto -> name,
            $producto -> price,
            //1,
            array("urlimagen"=>$producto->urlimagen)
        );
        //return redirect('/productos')->with('success',"$producto->nombre Se ha 
        //agregado con exito al carrito de compra!");
        return back()->with('success',"$producto->name se ha agregado con exito al carrito!");
    }

    public function removeItem(Request $request){
        //$producto = Producto::where('id',$request->id)->firstOrFail();
        Cart::remove([
            'id'=> $request ->id,
        ]);
        return back()->with('success',"Producto eliminado con exito de su carrito");
    }
}