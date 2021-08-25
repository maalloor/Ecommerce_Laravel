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
        $data['products'] = Product::paginate(3);
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
        $fields = [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:400',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'size' => 'required|string|max:1',
            'category_id' => 'required|regex:/^[1-4]$/'
        ];

        $message = [
            'name.required' => 'El nombre del producto es requerido',
            'description.required' => 'La descripción del producto es requerida',
            'price.required' => 'El precio del producto es requerido',
            'price.regex' => 'El formato de precio es incorrecto',
            'size.required' => 'La talla del producto es requerida',
            'category_id.required' => 'El id de la categoría del producto es requerida',
            'category_id.regex' => 'El rango de categorías es de 1 - 4'
        ];

        if ($request->hasFile('image'))
        {
            $fields = ['image' => 'required|max:10000|mimes:PNG,png,jpeg'];
            $message = ['image.required' => 'La foto del producto es requerida'];
        }
        
        $this->validate($request, $fields, $message);

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
        $fields = [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:400',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'size' => 'required|string|max:1',
            'category_id' => 'required|regex:/^[1-4]$/'
        ];

        $message = [
            'name.required' => 'El nombre del producto es requerido',
            'description.required' => 'La descripción del producto es requerida',
            'price.required' => 'El precio del producto es requerido',
            'price.regex' => 'El formato de precio es incorrecto',
            'size.required' => 'La talla del producto es requerida',
            'category_id.required' => 'El id de la categoría del producto es requerida',
            'category_id.regex' => 'El rango de categorías es de 1 - 4'
        ];

        if ($request->hasFile('image'))
        {
            $fields = ['image' => 'required|max:10000|mimes:PNG,png,jpeg'];
            $message = ['image.required' => 'La foto del producto es requerida'];
        }
        
        $this->validate($request, $fields, $message);

        $product_data = request()->except(['_token', '_method']);

        if ($request->hasFile('image'))
        {
            $product = Product::findOrFail($id);
            Storage::delete('public/'.$product->image);
            $product_data['image'] = $request->file('image')->store('uploads','public');
        }

        Product::where('id','=',$id)->update($product_data);
        $product = Product::findOrFail($id);
        //return view('product.edit',compact('product'));

        return redirect('product')->with('mensaje', 'Producto Editado');
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
