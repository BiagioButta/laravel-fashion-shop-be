@extends('layouts.admin')

@section('content')

    <h1>{{$product->name}}</h1>
    <img src="" alt="">
    <p>{{$product->description}}</p>
    <p><a href="{{$product->product_link}}">{{$product->product_link}}</a></p>
    <p>{{$product->price}}</p>
    <p>{{$product->tags}}</p>
    <p>{{$product->brand->name}}</p>
    <p>{{$product->texture->name}}</p>
    <p>{{$product->category->name}}</p>
    <p>{{$product->available}}</p>


@endsection
