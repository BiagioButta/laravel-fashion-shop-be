@extends('layouts.admin')

@section('content')

<h1>Brands List</h1>
    <a href="{{ route('admin.brands.create') }}"> Add new brand </a>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <th scope="row">{{ $brand->id }}</th>
                    <th class="text-uppercase" scope="row">{{ $brand->name }}</th>
                    <td><a class="link-secondary" href="{{route('admin.brands.edit', $brand->slug)}}" title="Edit texture"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{ route('admin.brands.destroy', $brand->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{ $brand->name }}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
 
@endsection
