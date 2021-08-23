<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::paginate(10);
        return view('product.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product_data = request()->except('_token');

        if ($request->hasFile('image'))
        {
            $product_data['image'] = $request->file('image')->store('uploads','public');
        }
        Product::insert($product_data);

        //return response()->json($product_data);
        return redirect('product')->with('mensaje', 'Producto agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_data = request()->except(['_token', '_method']);

        if ($request->hasFile('image'))
        {
            $product = Product::findOrFail($id);
            Storage::delete('public/'.$product->image);
            $product_data['image'] = $request->file('image')->store('uploads','public');
        }

        Product::where('id','=',$id)->update($product_data);
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $product = Product::findOrFail($id);

        //Para evitar que al momento de borrar un usuario, su foto se quede en el Storage

        if (Storage::delete('public/'.$product->image))
        {
            Product::destroy($id);
        }

        //return redirect('product');
        return redirect('product')->with('mensaje', 'Producto Borrado');
    }
}
