<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Notification;
use App\Notifications\NewJobNotification;
use App\Notifications\NewExamNotification;
use App\Notifications\NewResultNotification;
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


    public function getEligibleUsers($jobEligibility)
    {
        $eligibleUsers = collect();
    
        // Determine eligible users based on job's qualification requirement
        switch ($jobEligibility) {
            case '10th':
                // If the job requires 10th, all users with 10th qualification are eligible
                $eligibleUsers = User::where('qualification', '10th')->get();
                break;
    
            case '12th':
                // If the job requires 12th, users with 12th, Graduate, and Post-Graduate qualifications are eligible
                $eligibleUsers = User::whereIn('qualification', ['12th', 'Graduate', 'Post-Graduate'])->get();
                break;
    
            case 'Graduate':
                // If the job requires Graduate, users with Graduate and Post-Graduate qualifications are eligible
                $eligibleUsers = User::whereIn('qualification', ['Graduate', 'Post-Graduate'])->get();
                break;
    
            case 'Post-Graduate':
                // If the job requires Post-Graduate, all users with Post-Graduate qualifications are eligible
                $eligibleUsers = User::where('qualification', 'Post-Graduate')->get();
                break;
        }
    
        return $eligibleUsers;
    }

    // Users
    public function users(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'username'); // Default to 'username'
        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
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
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('location', 'like', "%$search%");
            });
        }

        $query->orderBy($sort);
        $jobs = $query->paginate(10);

        return view('admin.jobs', compact('jobs', 'search', 'sort'));
    }

    // Add Job
    public function storeJob(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate the incoming data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'organization' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'eligibility' => 'required|string', // added
                'job_type' => 'required|string', // added
                'application_start_date' => 'required|date', // added
                'application_end_date' => 'required|date', // added
                'job_status' => 'required|string', // added
                'vacancies' => 'required|integer|min:1', // added
            ]);

            // Create the new Job entry
            $job = Job::create($validatedData);

            // Assuming `getEligibleUsers` is a method that retrieves users based on eligibility
            $eligibleUsers = $this->getEligibleUsers($validatedData['eligibility']);

            // Send the notification to all eligible users
            Notification::send($eligibleUsers, new NewJobNotification($job));

            // Redirect with success message
            return redirect()->route('admin.jobs.index')->with('success', 'Job Created successfully and notifications sent to all eligible users');
        }

        return view('admin.job-form')->with('error', 'Job Creation Error');
    }

    public function addJob()
    {
        return view('admin.job-form');
    }


    // Edit Job
    public function editJob($id)
    {
        $job = Job::findOrFail($id);

        return view('admin.job-form', compact('job'));
    }

    // Update Job
    public function updateJob(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'location' => 'required|string',
            'eligibility' => 'required|string',
            'job_type' => 'required|string',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date',
            'job_status' => 'required|string',
            'vacancies' => 'required|integer|min:1',
        ]);

        $job = Job::findOrFail($id);
        $job->update($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully');
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
        return view('admin.exam-form');
    }

    // Store Exam (Creates a new exam)
    public function storeExam(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate the incoming data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'exam_date' => 'required|date',
                'description' => 'required|string',
                'qualification' => 'required|string',
            ]);

            // Create the new Exam entry
            $exam = Exam::create($validatedData);

            // Assuming `getEligibleUsers` is a method that retrieves users based on eligibility
            $eligibleUsers = $this->getEligibleUsers($validatedData['qualification']);

            // Send the notification to all eligible users
            Notification::send($eligibleUsers, new NewExamNotification($exam));

            // Redirect with success message
            return redirect()->route('admin.exams.index')->with('success', 'Exam added successfully');
        }
    }


    // Edit Exam
    public function editExam($id)
    {
        $exam = Exam::find($id);

        if (!$exam) {
            return redirect()->back()->with('error', 'Exam not found');
        }

        return view('admin.exam-form', compact('exam'));
    }

    // Update Exam
    public function updateExam(Request $request, $id)
    {


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'exam_date' => 'required|date|date_format:Y-m-d',  // Adjust format if needed
            'qualification' => 'required|string',
        ], [
            'name.required' => 'The exam name is required.',
            'exam_date.date' => 'The exam date must be a valid date.',
            // Add other custom error messages if needed
        ]);


        $exam = Exam::findOrFail($id);
        $exam->update($validatedData);

        return redirect()->route('admin.exams.index')->with('success', 'Exam updated successfully');
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
        return view('admin.result-form');
    }

    // Store Result (Creates a new result)
    public function storeResult(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate the incoming data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'result_link' => 'required',
                'release_date' => 'required|date',
            ]);

            // Create the new Result entry
            $result = Result::create($validatedData);

            // Assuming `getEligibleUsers` is a method that retrieves users based on eligibility
            

            // Send the notification to all eligible users
            Notification::send(User::all(), new NewResultNotification($result));

            // Redirect with success message
            return redirect()->route('admin.results.index')->with('success', 'Result added successfully');
        }
    }


    // Edit Result
    public function editResult($id)
    {
        $result = Result::find($id);

        if (!$result) {
            return redirect()->back()->with('error', 'Result not found');
        }

        return view('admin.result-form', compact('result'));
    }

    // Update Result
    public function updateResult(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'result_link' => 'required|url',
            'release_date' => 'required|date',
        ]);

        $result = Result::findOrFail($id);
        $result->update($validatedData);

        return redirect()->route('admin.results.index')->with('success', 'Result updated successfully');
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
