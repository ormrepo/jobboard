<?php

namespace App\Http\Controllers\Api;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Job::all();
    }


    /**
     * Display the specified Job.
     *
     * @param Job $job
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Job $job)
    {
        return $job;

    }

    /**
     * Store a newly created Job in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = Job::create($request->all());

        return response()->json($job, 201);
    }

    /**
     * Update a job
     *
     * @param Job $job
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Job $job, Request $request)
    {
        $job->update($request->all());

        return response()->json($job, 200);

    }


    /**
     * Delete a job
     *
     * @param Job $job
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Job $job)
    {

        $job->delete();

        return response()->json(null, 204);
    }








}
