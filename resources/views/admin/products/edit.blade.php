@extends('layouts.admin')

@section('content')
        <h1>Edit product: {{$product->name}}</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.products.update', $product->slug)}}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $product->name)}}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
 
                    <div class="d-flex">
                        <div class="media me-4">
                            <img class="shadow" width="150" src="{{asset('storage/' . $product->image)}}" alt="{{$product->image}}">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control  @error('image') is-invalid @enderror" >
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea rows="10" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description', $product->description)}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="product_link" class="form-label">Product link</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="product_link" name="product_link" value="{{old('product_link', $product->product_link)}}">
                    </div>

                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control  @error('price') is-invalid @enderror" value="{{old('price', $product->price)}}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Select brand</label>
                        <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                          <option value="">Select brand</option>
                          @foreach ($brands as $brand)
                          <option value="{{ $brand->id }}"{{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                          @endforeach
                        </select>
                        @error('brand_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="texture_id" class="form-label">Select texture</label>
                        <select name="texture_id" id="texture_id" class="form-control @error('texture_id') is-invalid @enderror">
                          <option value="">Select brand</option>
                          @foreach ($textures as $texture)
                          <option value="{{ $texture->id }}"{{ old('texture_id', $product->texture_id) == $texture->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                          @endforeach
                        </select>
                        @error('texture_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Select category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                          <option value="">Select category</option>
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}"{{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label> <br>
                            @foreach ($tags as $tag)
                                @if (old("tags"))
                                    <div class="d-flex col-xxl-2 col-lg-3 col-md-4 col-6">
                                        <input class="me-2" type="checkbox" name="tags[]" value="{{ $tag->id }}" {{in_array( $tag->id, old("tags", []) ) ? 'checked' : ''}}>
                                        <span class="text-capitalize">{{ $tag->name }}</span>
                                    </div>
                                @else
                                    <div class="d-flex col-xxl-2 col-lg-3 col-md-4 col-6">
                                        <input class="me-2" type="checkbox" name="tags[]" value="{{ $tag->id }} " {{ old('tags', $product->tags) ? (old('tags', $product->tags)->contains($tag->id) ? 'checked' : '') : '' }}>
                                        <span class="text-capitalize">{{ $tag->name }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    {{-- <div class="mb-3">
                        <p>Select tag</p>
                        @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                @if (old("tags"))
                                    <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array( $tag->id, old("tags", []) ) ? 'checked' : ''}}>
                                @else
                                    <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{$product->tags->contains($tag) ? 'checked' : ''}}>
                                @endif
                                    <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                            </div>
                        @endforeach
                        @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <div class="mb-3">
                        <label for="available" class="form-label">Available</label>
                        <input type="radio" name="available" value="1" {{old('available', $product->available) == 1 ? 'checked' : ''}}>
                        <span class="text-capitalize">yes</span>
                        <input type="radio" name="available" value="0" {{old('available', $product->available) == 0 ? 'checked' : ''}}>
                        <span class="text-capitalize">no</span>
                    </div>
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>

@endsection
