<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Http\Requests\StoreJobListingRequest;
use App\Http\Requests\UpdateJobListingRequest;

class JobListingController extends Controller
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
     * @param  \App\Http\Requests\StoreJobListingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobListingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function show(JobListing $jobListing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function edit(JobListing $jobListing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobListingRequest  $request
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobListingRequest $request, JobListing $jobListing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobListing  $jobListing
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobListing $jobListing)
    {
        //
    }
}
