<?php

namespace App\Http\Controllers;

use App\Models\JobClick;
use App\Http\Requests\StoreJobClickRequest;
use App\Http\Requests\UpdateJobClickRequest;

class JobClickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobClickRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobClickRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobClick  $jobClick
     * @return \Illuminate\Http\Response
     */
    public function show(JobClick $jobClick)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobClick  $jobClick
     * @return \Illuminate\Http\Response
     */
    public function edit(JobClick $jobClick)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobClickRequest  $request
     * @param  \App\Models\JobClick  $jobClick
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobClickRequest $request, JobClick $jobClick)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobClick  $jobClick
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobClick $jobClick)
    {
        //
    }
}
