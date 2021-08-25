
<h2>{{ $change }} Producto</h2>

@if (count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ol>
        @foreach( $errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ol>
    </div>
@endif

<div class="form-group">
    <label for="product">Nombre del producto: </label>
    <input class="form-control" type="text" value= "{{ isset($product->name) ? $product->name : old('name') }}" name="name">
</div>

<div class="form-group">
    <label for="description">Descripción: </label>
    <input class="form-control" type="text" value= "{{ isset($product->description) ? $product->description : old('description') }}" name="description">
</div>

<div class="form-group">
    <label for="price">Precio: </label>
    <input class="form-control" type="text" value= "{{ isset($product->price) ? $product->price : old('price') }}" name="price">
</div>

<div class="form-group">
    <label for="size">Talla: </label>
    <input class="form-control" type="text" value= "{{ isset($product->size) ? $product->size : old('size') }}" name="size">
</div>

<div class="form-group">
    <label for="category">Categoría: </label>
    <input class="form-control" type="text" value= "{{ isset($product->category_id) ? $product->category_id : old('category_id') }}" name="category_id">
</div>

<div class="form-group">
    <label for="image">Foto del producto: </label>
        @if (isset($product->image))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$product->image }}" width="100" alt="">
        @endif
    <input class="form-control" type="file" value= "" name="image" id="image">
</div>

<input class="btn btn-success" type="submit" value="{{ $change }} Producto">
<a class="btn btn-primary" href="{{ url('product/') }}">Volver a la lista de productos</a>



