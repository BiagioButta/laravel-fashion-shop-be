<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        dd($products);
        return view('admin.products.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $tags = Tag::all();
        $brands = Brand::all();

        return view('admin.products.create', compact('types', 'tags', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $slug = Product::generateSlug($request->name);
        $data['slug'] = $slug;
        $new_product = Product::create($data);

        if($request->has('tag_id')){
            $new_product->tags()->attach($request->tags);
        }

        return redirect()->route('admin.products.show', $new_product->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $tags = Tag::all();
        $types = Type::all();

        return view('admin.products.edit', compact('product', 'brands', 'tags', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $slug = Product::generateSlug($request->name);
        $data['slug'] = $slug;

        $product->update($data);

        if($request->has('tag_id')){
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->sync([]);
        }

        return redirect()->route('admin.products.index')->with('message', "$product->name updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @param \App\Models\Product $product
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->name deleted successfully");
    }
}
