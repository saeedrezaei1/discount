<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobsController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/job-list');
        dd($response->ok());
//        dd(json_decode($response));
        $jobs = $response->body();
        return view('admin.jobs.index',compact('jobs'));
    }
}
