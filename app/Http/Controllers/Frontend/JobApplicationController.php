<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{

    public function index()
    {
        $data['applications'] = JobApplication::orderBy('created_at', 'desc')->get();
        return view('backend.job.list-of-jobs', $data);
    }
    public function create()
    {
        return view('frontend.job.create');
    }

    public function show($id)
    {
        $application = JobApplication::find($id);
        $application->is_seen = 1; // Mark as seen (downloaded)
        $application->save();

        return view('backend.job.show-job', compact('application'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job_title' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:4048',
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

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);

        // Optional: Delete associated file if exists
        if ($application->file) {
            // You can delete the file here if it's stored locally, for example:
            Storage::delete($application->file);
        }
        $application->delete();
        return redirect()->route('jobs.index')->with('success', 'Application deleted successfully.');
    }


    public function download($id)
    {
        // Find the job application
        $application = JobApplication::findOrFail($id);
        if ($application->is_seen != 1) {
            $application->is_seen = 1;
            $application->save();
        }

        // Ensure the file exists
        $filePath = storage_path('app/public/' . $application->file);
        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Return the file for download
        return response()->download($filePath);
    }
}
