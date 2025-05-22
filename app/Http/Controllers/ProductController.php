<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        //
        $products = Product::orderByDesc('id')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            // Remove images from validated data as we'll handle them separately
            if (isset($validated['images'])) {
                $images = $validated['images'];
                unset($validated['images']);
            }
            
            // Keep thumbnail for backward compatibility
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('products', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
            
            // Create the product
            $product = Product::create($validated);
            
            // Handle multiple images if present
            if (isset($images) && is_array($images)) {
                $this->saveProductImages($product, $images);
            }
        });
        
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        DB::transaction(function () use ($request, $product) {
            $validated = $request->validated();
            
            // Remove images from validated data as we'll handle them separately
            if (isset($validated['images'])) {
                $images = $validated['images'];
                unset($validated['images']);
            }
            
            // Keep thumbnail for backward compatibility
            if ($request->hasFile('thumbnail')) {
                // Delete old thumbnail if exists
                if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
                    Storage::disk('public')->delete($product->thumbnail);
                }
                
                $thumbnailPath = $request->file('thumbnail')->store('products', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
            
            // Update the product
            $product->update($validated);
            
            // Handle multiple images if present
            if (isset($images) && is_array($images)) {
                $this->saveProductImages($product, $images);
            }
            
            // Handle image deletions if specified
            if ($request->has('delete_images') && is_array($request->delete_images)) {
                $this->deleteProductImages($product, $request->delete_images);
            }
            
            // Handle primary image selection if specified
            if ($request->has('primary_image_id')) {
                $this->setPrimaryImage($product, $request->primary_image_id);
            }
        });
        
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        DB::transaction(function() use ($product) {
            // Delete all associated images from storage
            foreach ($product->images as $image) {
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
            }
            
            // Delete the product (and related images due to cascade)
            $product->delete();
        });
        
        return redirect()->route('admin.products.index');
    }
    
    /**
     * Save multiple images for a product.
     */
    private function saveProductImages(Product $product, array $images)
    {
        foreach ($images as $index => $image) {
            $imagePath = $image->store('product-images', 'public');
            
            // Determine if this is the primary image (first image is primary if none exists)
            $isPrimary = false;
            if ($index === 0 && !$product->images()->where('is_primary', true)->exists()) {
                $isPrimary = true;
            }
            
            $product->images()->create([
                'image_path' => $imagePath,
                'is_primary' => $isPrimary,
            ]);
        }
    }
    
    /**
     * Delete specified images for a product.
     */
    private function deleteProductImages(Product $product, array $imageIds)
    {
        $images = $product->images()->whereIn('id', $imageIds)->get();
        
        foreach ($images as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }
        
        // If we deleted the primary image, set a new one if available
        if (!$product->images()->where('is_primary', true)->exists() && $product->images()->count() > 0) {
            $product->images()->first()->update(['is_primary' => true]);
        }
    }
    
    /**
     * Set the primary image for a product.
     */
    private function setPrimaryImage(Product $product, $imageId)
    {
        // Reset all images to non-primary
        $product->images()->update(['is_primary' => false]);
        
        // Set the selected image as primary
        $product->images()->where('id', $imageId)->update(['is_primary' => true]);
    }
}
