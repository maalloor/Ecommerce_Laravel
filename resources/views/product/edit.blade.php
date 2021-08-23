Formulacion de edición de producto

<form action="{{ url('/product/'.$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    {{ method_field('PATCH') }}

    @include('product.form',['change'=>'Editar']);

</form>


