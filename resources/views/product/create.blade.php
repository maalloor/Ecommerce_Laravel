Formulario de creación de producto
<form action="{{ url('/product') }}" method="post" enctype="multipart/form-data" >
    @csrf
    @include('product.form',['change'=>'Crear']);

</form>