@extends('layouts.admin')


@section('content')
    <h1>Create Products</h1>

    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form_control"
                        @error('image') is-invalid @enderror>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="product_link" class="form-label">Product_link</label>
                    <input type="text" name="product_link" id="product_link" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" class="form_control" min="0.01" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="brand_id" class="form-label">Select brand</label>
                    <select name="brand_id" id="brand_id" class="form_control" required>
                        <option value="">Select</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id') ? 'selected' : '' }}>
                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="texture_id" class="form-label">Select texture</label>
                    <select name="texture_id" id="texture_id" class="form_control" required>
                        <option value="">Select</option>
                        @foreach ($textures as $texture)
                            <option value="{{ $texture->id }}" {{ $texture->id == old('texture_id') ? 'selected' : '' }}>
                                {{ $texture->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Select category</label>
                    <select name="category_id" id="category_id" class="form_control" required>
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="available" class="form-label">Available</label>
                    <input type="radio" name="available" value="1" checked>
                    <span class="text-capitalize">yes</span>
                    <input type="radio" name="available" value="0">
                    <span class="text-capitalize">no</span>
                </div>

                @foreach ($tags as $tag)
                    @if (old('tags'))
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        <span class="text-capitalize">{{ $tag->name }}</span>
                    @else
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }} "
                            {{ old('tags', $product->tags) ? (old('tags', $product->tags)->contains($tag->id) ? 'checked' : '') : '' }}>
                        <span class="text-capitalize">{{ $tag->name }}</span>
                    @endif
                @endforeach

                {{-- <div class="mb-3">
                    <label for="tags" class="form-label">Select tag</label>
                    <select multiple class="form-select" name="tags[]" id="tags">
                        @forelse ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @empty
                            <option value="">No tag</option>
                        @endforelse

                    </select>
                </div> --}}
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
