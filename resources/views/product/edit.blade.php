@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/product/'.$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    {{ method_field('PATCH') }}

    @include('product.form',['change'=>'Editar']);

</form>
</div>
@endsection

