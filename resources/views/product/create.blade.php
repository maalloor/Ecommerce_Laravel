@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/product') }}" method="post" enctype="multipart/form-data" >
    @csrf
    @include('product.form',['change'=>'Añadir Nuevo']);

</form>
</div>
@endsection