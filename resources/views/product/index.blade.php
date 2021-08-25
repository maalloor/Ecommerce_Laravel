@extends('layouts.app')
@section('content')
<div class="container">


@if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('mensaje') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<a href="{{ url('product/create') }}" class="btn btn-primary"><img src="https://image.flaticon.com/icons/png/512/1037/1037287.png" width="40" height="40">    Añadir Nuevo Producto</a>
<br/>
<br/>
<hr>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID Producto</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Talla</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $products as $product )
        <tr>
            <td>{{ $product->id }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$product->image }}" width="150" alt="">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->size }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category_id }}</td>
            <td>
            <a href="{{ url('/product/'.$product->id.'/edit') }}" class="btn btn-warning">
                <img src="https://image.flaticon.com/icons/png/512/2919/2919592.png" width="25" height="25" alt="">
            </a>
            <form action="{{ url('/product/'.$product->id) }}" method="post" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}
                
                <input type="image" class="btn btn-danger" onclick="return confirm('¿Seguro de borrar este producto?')"
                src="https://image.flaticon.com/icons/png/512/1828/1828843.png" width="50" height="40">
            </form>
        
            </td>
        </tr>
        @endforeach

    </tbody>

</table>
{!! $products->links() !!}
</div>
@endsection