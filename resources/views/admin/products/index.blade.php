@extends('layouts.admin')

@section('content')
    <h1>Products List</h1>
    <a href="{{ route('admin.products.create') }}"> Crea nuovo product </a>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Product link</th>
                <th scope="col">Price</th>
                <th scope="col">Brand</th>
                <th scope="col">Texture</th>
                <th scope="col">Category</th>
                <th scope="col">Available</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td><a href="{{ route('admin.products.show', $product->slug) }}"title="View product">{{ $product->name }}</a></td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td><a href="{{$product->product_link}}">{{Str::limit($product->product_link, 20)}}</a></td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->brand ? $product->brand->name : 'No brand'}}</td>
                    <td>{{$product->texture ? $product->texture->name : 'No texture'}}</td>
                    <td>{{$product->category ? $product->category->name : 'No category'}}</td>
                    <td>{{$product->available}}</td>
                    <td><a class="link-secondary" href="{{ route('admin.products.edit', $product->slug) }}"
                            title="Edit product"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $product->name }}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links('vendor.pagination.bootstrap-5') }}
    @include('partials.admin.modal-delete')
@endsection
