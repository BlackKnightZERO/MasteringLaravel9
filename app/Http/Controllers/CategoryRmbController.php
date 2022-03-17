<?php

namespace App\Http\Controllers;

use App\Models\CategoryRmb;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoryRmbRequest;
use App\Http\Requests\StoreCategoryRmbRequest;
use Illuminate\Support\Str;

class CategoryRmbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryRmbs = CategoryRmb::latest()->paginate(20);
        return view('backend.categoryRMB.index', compact('categoryRmbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categoryRMB.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRmbRequest $request)
    {
        CategoryRmb::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'),'-'),
        ]);
        return redirect()->route('category-rmb.index')->with('message', 'Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryRmb  $categoryRmb
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryRmb $categoryRmb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryRmb  $categoryRmb
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryRmb $categoryRmb)
    {
        return view('backend.categoryRMB.edit', compact('categoryRmb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryRmb  $categoryRmb
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRmbRequest $request, CategoryRmb $categoryRmb)
    {
        $categoryRmb->update($request->only(['title','uuid']));
        $categoryRmb->update([
            'slug' => Str::slug($request->input('title'), '-') ."-". rand(),
        ]);
        return redirect()->route('category-rmb.index')->with('message', 'Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryRmb  $categoryRmb
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryRmb $categoryRmb)
    {
        $categoryRmb->delete();
        return redirect()->route('category-rmb.index')->with('message', 'Deleted successfully');
    }
}
