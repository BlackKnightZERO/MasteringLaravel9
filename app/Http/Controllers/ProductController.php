<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\FileUploadService;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    private $fileUploadService;

    public function __construct(FileUploadService $fileUploadService){
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('Category', 'tags')->latest()->paginate(20);
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.product.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        // if ($request->hasFile('file')) {   
        //     $request->validate(['file' => 'file|mimes:jpg,jpeg,png|max:5120']);        
        //     $path = $this->fileUploadService->upload('Product', $request->file('file'));
        // }

        $newProduct = Product::create($request->validated());

        if($request->hasFile('file')) {

            $request->validate(['file' => 'file|mimes:jpg,jpeg,png|max:5120']);        
            $path = $this->fileUploadService->upload('Product', $request->file('file'));

            Storage::create([
                'storageable_id' => $newProduct->id,
                'storageable_type' => 'App\Models\Product',
                'file_type' => $request->file('file')->extension(),
                'path'  => $path
            ]);
        }

        if($request->input('tag_id')) {
            $newProduct->tags()->sync($request->input('tag_id'));
        }

        return redirect()->route('product.index')->with('message', 'Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $productTags        = $product->tags->pluck('id')->toArray();
        $productCategory    = $product->category;
        $productStorages    = $product->storages;

        $storagePath = ($productStorages->isNotEmpty()) ? $productStorages[0]->path : null;
        
        return view('backend.product.edit', compact('product', 'categories', 'tags', 'productTags', 'productCategory', 'storagePath'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $oldStorages = $product->storages;
        $oldStoragesPath = ($oldStorages->isNotEmpty()) ? $oldStorages[0]->path : null;

        if ($request->hasFile('file')) {   
            $request->validate(['file' => 'file|mimes:jpg,jpeg,png|max:5120']);        
            $path = $this->fileUploadService->upload('Product', $request->file('file'));
            $this->fileUploadService->destroy($oldStoragesPath);
            $product->storages()->update(['path' => $path]);
        }

        $product->update($request->validated());

        if($request->input('tag_id')) {
            $product->tags()->sync($request->input('tag_id'));
        }

        return redirect()->route('product.index')->with('message', 'Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $oldStorages = $product->storages;
        $oldStoragesPath = ($oldStorages->isNotEmpty()) ? $oldStorages[0]->path : null;

        if($oldStoragesPath){
            $this->fileUploadService->destroy($oldStoragesPath);
        }

        $product->tags()->detach();
        $product->storages()->delete();
        $product->delete();

        return redirect()->route('product.index')->with('message', 'Deleted successfully');
    }
}
