@extends('layouts.admin')


@section('content')
<div class="container">


    <h1>Add new texture</h1>

    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.textures.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
