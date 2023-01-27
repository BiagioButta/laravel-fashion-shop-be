@extends('layouts.admin')

@section('content')

<h1>Tags List</h1>
    <a href="{{ route('admin.tags.create') }}"> Add new tag </a>
    
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
            @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <th class="text-uppercase" scope="row">{{ $tag->name }}</th>
                    <td><a class="link-secondary" href="{{route('admin.tags.edit', $tag->slug)}}" title="Edit texture"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{ route('admin.tags.destroy', $tag->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{ $tag->name }}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
    {{ $tags->links('vendor.pagination.bootstrap-5') }}
 
@endsection

