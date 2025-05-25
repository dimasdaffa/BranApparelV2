<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBaseProductRequest;
use App\Http\Requests\UpdateBaseProductRequest;
use App\Models\BaseProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseProductController extends Controller
{
    public function index()
    {
        //
        $baseproducts = BaseProduct::orderByDesc('id')->paginate(10);
        return view('admin.baseproducts.index', compact('baseproducts'));
    }

    public function create()
    {
        //
        return view('admin.baseproducts.create');
    }

    public function store(StoreBaseProductRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('products', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
            $newProduct = BaseProduct::create($validated);
        });
        return redirect()->route('admin.baseproducts.index');
    }

    public function show(BaseProduct $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BaseProduct $baseproduct)
    {
        //
        return view('admin.baseproducts.edit', compact('baseproduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBaseProductRequest $request, BaseProduct $baseproduct)
    {
        //
        DB::transaction(function () use ($request, $baseproduct) {
            $validated = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
            $baseproduct->update($validated);
        });
        return redirect()->route('admin.baseproducts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BaseProduct $baseproduct)
    {
        //
        DB::transaction(function() use ($baseproduct) {
            $baseproduct->delete();
        });
        return redirect()->route('admin.baseproducts.index');
    }
}
