@extends('layouts.admin')

@section('content')
    <h1>Product</h1>
    <a href="{{ route('admin.products.create') }}"> Crea nuovo product </a>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td><a href="{{ route('admin.products.show', $product->slug) }}"
                            title="View product">{{ $product->name }}</a></td>
                    <td>{{ Str::limit($product->description, 100) }}</td>
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
    @include('partials.admin.modal-delete')
@endsection
