@extends('layouts.admin')


@section('content')
<div class="container">


    <h1>Edit texture</h1>

    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST" class="p-4">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{old('name', $category->name)}}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               
                <button type="submit" class="btn btn-success">Edite</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
