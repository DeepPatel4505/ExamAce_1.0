<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class tagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for the tag by name
        $tag = Tag::where('name', 'LIKE', "%{$query}%")->first();

        if ($tag) {
            // If tag is found, redirect to the tag's show page
            return redirect()->route('tags.show', $tag);
        } else {
            // If no tag is found, return back with a message
            return redirect()->route('tags.index')->with('message', 'No tags found matching your search.');
        }
    }

    public function show($tag)
    {
        $tag = Tag::findOrfail($tag);

        $jobs = $tag->job;
        $exams = $tag->exam;
        $results = $tag->result;

        //d($results);
        return view('tags.show', compact('tag', 'jobs', 'exams', 'results'));
    }
}
