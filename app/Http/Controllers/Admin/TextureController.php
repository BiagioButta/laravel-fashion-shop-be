<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTextureRequest;
use App\Http\Requests\UpdateTextureRequest;
use App\Models\Texture;
use Illuminate\Http\Request;

class TextureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textures = Texture::all();
        // dd($brands);
        return view('admin.textures.index', compact('textures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.textures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTextureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTextureRequest $request)
    {
        $data = $request->validated();
        $slug = Texture::generateSlug($request->name);
        $data['slug'] = $slug;

        $new_texture = Texture::create($data);

        return redirect()->route('admin.textures.index', $new_texture->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function show(Texture  $texture)
    {
        return view('admin.textures.show', compact('textures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function edit(Texture  $texture)
    {
        return view('admin.textures.edit', compact('texture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTextureRequest  $request
     * @param  \App\Models\Texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTextureRequest $request, Texture  $texture)
    {
        $data = $request->validated();
        $slug = Texture::generateSlug($request->name);
        $data['slug'] = $slug;

        $texture->update($data);

        return redirect()->route('admin.textures.index')->with('message', "$texture->name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Texture  $texture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Texture  $texture)
    {
        $texture->delete();
        
        return redirect()->route('admin.textures.index')->with('message', "$texture->name deleted successfully");
    }
}
