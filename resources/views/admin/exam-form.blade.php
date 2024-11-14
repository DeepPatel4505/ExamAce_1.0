@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">{{ isset($exam) ? 'Edit' : 'Add' }} Exam</h1>

    <form action="{{ isset($exam) ? route('admin.exams.update', $exam->id) : route('admin.exams.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        @if (isset($exam))
        @method('PUT')
        @endif

        <!-- Exam Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Exam Name</label>
            <input type="text" name="name" id="name" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('name', $exam->name ?? '') }}" required>
        </div>
        <!-- Exam Desc -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Exam Description</label>
            <textarea name="description" id="description" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" required>{{ old('description', $exam->description ?? '') }}</textarea>

        </div>

        <!-- Exam Date -->
        <div class="mb-4">
            <label for="exam_date" class="block text-sm font-medium text-gray-700">Exam Date</label>
            <input type="date" name="exam_date" id="exam_date" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('date', isset($exam) && $exam->exam_date ? \Carbon\Carbon::parse($exam->exam_date)->format('Y-m-d') : '') }}" required>
        </div>

        <!-- Exam Name -->
        <div class="mb-4">
            <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification</label>
            <select id="qualification" name="qualification" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" required>
                <option value="">Select Exam</option>
                <option value="10th" {{ old('qualification', $exam->qualification ?? '') == '10th' ? 'selected' : '' }}>10th</option>
                <option value="12th" {{ old('qualification', $exam->qualification ?? '') == '12th' ? 'selected' : '' }}>12th</option>
                <option value="Graduate" {{ old('qualification', $exam->qualification ?? '') == 'Graduate' ? 'selected' : '' }}>Graduate</option>
                <option value="Post-Graduate" {{ old('qualification', $exam->qualification ?? '') == 'Post-Graduate' ? 'selected' : '' }}>Post Graduate</option>
            </select>
        </div>





        <!-- Save Button -->
        <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Save</button>
    </form>
</div>
@endsection