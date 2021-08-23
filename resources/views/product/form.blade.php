
<h2>{{ $change }} Producto</h2>
<label for="product">Nombre del producto: </label>
    <input type="text" value= "{{ isset($product->name) ? $product->name : '' }}" name="name">
    <br>
    <label for="description">Descripción: </label>
    <input type="text" value= "{{ isset($product->description) ? $product->description : '' }}" name="description">
    <br>
    <label for="price">Precio: </label>
    <input type="number" value= "{{ isset($product->price) ? $product->price : '' }}" name="price">
    <br>
    <label for="size">Talla: </label>
    <input type="text" value= "{{ isset($product->size) ? $product->size : '' }}" name="size">
    <br>
    <label for="category">Categoria: </label>
    <input type="number" value= "{{ isset($product->category_id) ? $product->category_id : '' }}" name="category_id">
    <br>
    <label for="image">Foto del producto: </label>
    @if (isset($product->image))
        <img src="{{ asset('storage').'/'.$product->image }}" width="100" alt="">
    @endif
    <input type="file" value= "" name="image" id="image">
    <br>
    <input type="submit" value="{{ $change }} Producto">

    <a href="{{ url('product/') }}">Regresar</a>

    <br>

