Mostrar la lista de productos
@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif
<a href="{{ url('product/create') }}">Registrar nuevo producto</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
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
                <img src="{{ asset('storage').'/'.$product->image }}" width="100" alt="">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->size }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category_id }}</td>
            <td>
            <a href="{{ url('/product/'.$product->id.'/edit') }}">
                Editar 
        
            </a>    
            
            <form action="{{ url('/product/'.$product->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                 
                <input type="submit" onclick="return confirm('¿Seguro de borrar este producto?')"
                value="Delete">
            
            </form>
        
            </td>
        </tr>
        @endforeach

    </tbody>

</table>