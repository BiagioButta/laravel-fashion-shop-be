@extends('layouts.admin')

@section('content')

<h1>Textures List</h1>
    <a href="{{ route('admin.textures.create') }}"> Add new texture </a>
    
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
            @foreach ($textures as $texture)
                <tr>
                    <th scope="row">{{ $texture->id }}</th>
                    <th class="text-uppercase" scope="row">{{ $texture->name }}</th>
                    <td><a class="link-secondary" href="{{route('admin.textures.edit', $texture->slug)}}" title="Edit texture"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{ route('admin.textures.destroy', $texture->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{ $texture->name }}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
 
@endsection
