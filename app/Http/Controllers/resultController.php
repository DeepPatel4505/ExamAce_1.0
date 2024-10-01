<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Result;

class resultController extends Controller
{
    public function index(Request $request)
    {
        $results = Result::query();

        // Apply filters
        if ($request->filled('search')) {
            $results->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('Result_type')) {
            $results->where('Result_type', $request->Result_type);
        }

        // Apply pagination and sorting
        $results = $results->orderBy('created_at', 'desc')->paginate(10);


        return view('results.index', compact('results'));
    }

    public function show($id)
    {
        $result = Result::with('tags')->findOrFail($id); 
        //dd($Result->tags);
        return view('results.show', compact('result'));
    }
}
