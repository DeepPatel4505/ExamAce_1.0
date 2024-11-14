@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">{{ isset($result) ? 'Edit' : 'Add' }} Result</h1>

    <form action="{{ isset($result) ? route('admin.results.update', $result->id) : route('admin.results.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @if (isset($result))
            @method('PUT')
        @endif

        <!-- Result Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Result Name</label>
            <input type="text" name="name" id="name" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('name', $result->name ?? '') }}" required>
        </div>

        <!-- Release Link Input -->
        <div class="mb-4">
            <label for="result_link" class="block text-sm font-medium text-gray-700">Release Link</label>
            <input type="url" name="result_link" id="result_link" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('result_link', $result->result_link ?? '') }}" required>
        </div>
        
        <!-- Release Date Input -->
        <div class="mb-4">
            <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="mt-2 w-full border border-gray-300 rounded-md p-2 text-gray-900" value="{{ old('release_date', $result->release_date ?? '') }}" required>
        </div>

        <!-- Save Button -->
        <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Save</button>
    </form>
</div>
@endsection
