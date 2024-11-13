<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Exam;
use App\Models\Result;

class AdminDashboardController extends Controller
{
    // Dashboard
    public function index()
    {
        $usersCount = User::count() - 1; // Exclude admin
        $openJobsCount = Job::count();
        $examsCount = Exam::count();
        $resultsCount = Result::count();

        return view('admin.general', compact('usersCount', 'openJobsCount', 'examsCount', 'resultsCount'));
    }

    // Users
    public function users(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'username'); // Default to 'username'
        $query = User::query();
    
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('username', 'like', "%$search%")
                  ->orWhere('firstname', 'like', "%$search%")
                  ->orWhere('lastname', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }
    
        // Exclude the admin user
        $query->where('username', '!=', 'admin');
    
        // Apply sorting with priority
        if ($sort === 'fullname') {
            $query->orderByRaw("CONCAT(firstname, ' ', lastname)")
                  ->orderBy('email');
        } else {
            $query->orderBy($sort)
                  ->orderBy('email');
        }
    
        $users = $query->paginate(10);
        return view('admin.user', compact('users', 'search', 'sort'));
    }

    // Delete User
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        }

        return redirect()->back()->with('error', 'User not found');
    }

    // Jobs
    public function jobs(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'title'); // Default to 'title'
        $query = Job::query();
    
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('location', 'like', "%$search%");
            });
        }
    
        $query->orderBy($sort);
        $jobs = $query->paginate(10);

        return view('admin.jobs', compact('jobs', 'search', 'sort'));
    }

    // Add Job
    public function addJob(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
            ]);

            Job::create($validatedData);
            return redirect()->back()->with('success', 'Job added successfully');
        }

        return view('admin.job-form');
    }

    // Edit Job
    public function editJob(Request $request, $id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect()->back()->with('error', 'Job not found');
        }

        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
            ]);

            $job->update($validatedData);
            return redirect()->back()->with('success', 'Job updated successfully');
        }

        return view('admin.job-form', compact('job'));
    }

    // Delete Job
    public function deleteJob($id)
    {
        $job = Job::find($id);

        if ($job) {
            $job->delete();
            return redirect()->back()->with('success', 'Job deleted successfully');
        }

        return redirect()->back()->with('error', 'Job not found');
    }

    // Exams
    public function exams(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'name');
        $query = Exam::query();
    
        if ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('exam_date', 'like', "%$search%");
        }
    
        $query->orderBy($sort);
        $exams = $query->paginate(10);

        return view('admin.exams', compact('exams', 'search', 'sort'));
    }

    // Add Exam
    public function addExam(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'date' => 'required|date',
            ]);

            Exam::create($validatedData);
            return redirect()->back()->with('success', 'Exam added successfully');
        }

        return view('admin.exam-form');
    }

    // Edit Exam
    public function editExam(Request $request, $id)
    {
        $exam = Exam::find($id);

        if (!$exam) {
            return redirect()->back()->with('error', 'Exam not found');
        }

        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'date' => 'required|date',
            ]);

            $exam->update($validatedData);
            return redirect()->back()->with('success', 'Exam updated successfully');
        }

        return view('admin.exam-form', compact('exam'));
    }

    // Delete Exam
    public function deleteExam($id)
    {
        $exam = Exam::find($id);

        if ($exam) {
            $exam->delete();
            return redirect()->back()->with('success', 'Exam deleted successfully');
        }

        return redirect()->back()->with('error', 'Exam not found');
    }

    // Results
    public function results(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'name');
        $query = Result::query();
    
        if ($search) {
            $query->Where('name', 'like', "%$search%");
        }
    
        $query->orderBy($sort);
        $results = $query->paginate(10);

        return view('admin.results', compact('results', 'search', 'sort'));
    }

    // Add Result
    public function addResult(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'exam_id' => 'required|integer|exists:exams,id',
                'student_name' => 'required|string|max:255',
                'marks' => 'required|numeric',
            ]);

            Result::create($validatedData);
            return redirect()->back()->with('success', 'Result added successfully');
        }

        return view('admin.result-form');
    }

    // Edit Result
    public function editResult(Request $request, $id)
    {
        $result = Result::find($id);

        if (!$result) {
            return redirect()->back()->with('error', 'Result not found');
        }

        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'exam_id' => 'required|integer|exists:exams,id',
                'student_name' => 'required|string|max:255',
                'marks' => 'required|numeric',
            ]);

            $result->update($validatedData);
            return redirect()->back()->with('success', 'Result updated successfully');
        }

        return view('admin.result-form', compact('result'));
    }

    // Delete Result
    public function deleteResult($id)
    {
        $result = Result::find($id);

        if ($result) {
            $result->delete();
            return redirect()->back()->with('success', 'Result deleted successfully');
        }

        return redirect()->back()->with('error', 'Result not found');
    }
}
