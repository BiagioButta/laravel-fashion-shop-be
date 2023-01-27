@extends('layouts.admin')

@section('content')
    <h1>{{ $product->name }}</h1>
    <img class="w-100" src="{{ asset('storage/' . $product->image) }}" alt="">
    <p>{!! $product->description !!}</p>
    <p><a href="{{ $product->product_link }}">{{ $product->product_link }}</a></p>
    <p>{{ $product->price }}</p>
    @foreach ($product->tags as $tag)
        {{ $tag->name }}
    @endforeach
    @if ($product->brand_id)
        <p>{{ $product->brand->name }}</p>
    @endif
    @if ($product->texture_id)
        <p>{{ $product->texture->name }}</p>
    @endif
    @if ($product->category_id)
        <p>{{ $product->category->name }}</p>
    @endif
    <p>{{ $product->available }}</p>
@endsection
