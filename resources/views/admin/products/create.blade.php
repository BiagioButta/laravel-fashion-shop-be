@extends('layouts.admin')


@section('content')
<div class="container">


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
                    <input type="file" name="image" id="image" class="form_control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="product_link" class="form-label">Product_link</label>
                    <input type="url" name="product_link" id="product_link" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input name="price" id="price" type="number" class="form_control " min="0.01" step="0.01">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="brand_id" class="form-label">Select brand</label>
                    <select name="brand_id" id="brand_id" class="form_control @error('brand_id') is-invalid @enderror" required>
                        <option value="">Select</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="texture_id" class="form-label">Select texture</label>
                    <select name="texture_id" id="texture_id" class="form_control @error('texture_id') is-invalid @enderror" required>
                        <option value="">Select</option>
                        @foreach($textures as $texture)
                            <option value="{{$texture->id}}">{{$texture->name}}</option>
                        @endforeach
                    </select>
                    @error('texture_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Select category</label>
                    <select name="category_id" id="category_id" class="form_control @error('category_id') is-invalid @enderror" required>
                        <option value="">Select</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="available" class="form-label">Available</label>
                    <input type="radio" name="available" value="1" checked>
                        <span class="text-capitalize">yes</span>
                    <input type="radio" name="available" value="0" >
                        <span class="text-capitalize">no</span>
                </div>

                <div class="mb-3">
                    <p>Select tag</p>
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}">
                            <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
    </script>
    <script type="text/javascript">
      bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
</div>
@endsection
