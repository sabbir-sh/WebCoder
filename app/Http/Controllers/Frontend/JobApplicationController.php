<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

        /**
         * Show the job application form.
         */
        public function create()
        {
            return view('frontend.job.create');
        }

        /**
         * Store a new job application.
         */
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'job_title' => 'nullable|string|max:255',
                'type' => 'nullable|string|max:255',
                'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'expected_salary' => 'nullable|numeric',
                'status' => 'nullable|string|max:50',
                'message' => 'nullable|string',
            ]);

            // Handle file upload
            if ($request->hasFile('file')) {
                $validatedData['file'] = $request->file('file')->store('applications', 'public');
            }

            JobApplication::create($validatedData);

            return redirect()->back()->with('success', 'Your application has been submitted successfully.');
        }
}
