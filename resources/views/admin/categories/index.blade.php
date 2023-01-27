@extends('layouts.admin')

@section('content')

<h1>Categories List</h1>
    <a href="{{ route('admin.categories.create') }}"> Add new category </a>
    
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
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <th class="text-uppercase" scope="row">{{ $category->name }}</th>
                    <td><a class="link-secondary" href="{{route('admin.categories.edit', $category->slug)}}" title="Edit texture"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{ $category->name }}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
 
@endsection
