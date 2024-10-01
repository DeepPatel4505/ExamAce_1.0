<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class examController extends Controller
{
    public function index(Request $request)
    {
        $exams = Exam::query();

        // Apply filters
        if ($request->filled('search')) {
            $exams->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('exam_type')) {
            $exams->where('exam_type', $request->exam_type);
        }

        // Apply pagination and sorting
        $exams = $exams->orderBy('created_at', 'desc')->paginate(10);


        return view('exams.index', compact('exams'));
    }

    public function show($id)
    {
        $exam = Exam::with('tags')->findOrFail($id); 
       // dd($exam);
        return view('exams.show', compact('exam'));
    }
}
