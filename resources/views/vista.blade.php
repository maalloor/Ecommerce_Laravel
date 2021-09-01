@extends('layouts.app')

@@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sn-3">
                @if (count(Cart::getContent()))
                    {{count(Cart::getContent())}} 
                @endif
            </div>
            <div class="col-sn-9">
                <div class= "row justify-content-center">
                    @forelse ($products as $item)
                    <div class="col-4 border p-5 text-center">
                        <h1> {{$item->name}} </h1>
                        <p> {{$item->price}} </P>
                        <form action="{{route('cart.add')}}" method= "post">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="submit" name="btn" class="btn btn-success" value="ADD TO CART">

                        </form>
                    </div>

                    @empty
                    @endforelse
                </div>
            </div>
        </div>

    </div>
    
@endsection


