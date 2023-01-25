@extends('layouts.admin')

@section('content')

    <ul>

        @foreach ($brands as $brand)
            <li>{{$brand->name}}</li>
        @endforeach

    </ul>
 
@endsection
