@extends('layouts.admin')

@section('content')

    <ul>

        @foreach ($textures as $texture)
            <li>{{$texture->name}}</li>
        @endforeach

    </ul>
 
@endsection
