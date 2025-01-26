<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function index()
    {
        $data['sliders'] = HomeSlider::orderBy('created_at', 'desc')->get();
        $data['title'] = 'Home Slider';
        return view('backend.slider.homeslider', $data);
    }

    public function create()
    {
        return view('backend.slider.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'offer' => 'nullable|string',
            'published' => 'required|boolean',
            'link' => 'nullable|string',
        ]);

        HomeSlider::create($request->all());

        return redirect()->route('adminHomeSlider')->with('success', 'Slider created successfully.');
    }


    public function edit($id)
    {
        $data['slider'] = HomeSlider::findOrFail($id);
        return view('backend.slider.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $slider = HomeSlider::findOrFail($id);

        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'offer' => 'nullable|string',
            'published' => 'required|boolean',
            'link' => 'nullable|string',
        ]);

        $slider->update($request->all());

        return redirect()->route('adminHomeSlider')->with('success', 'Slider updated successfully.');
    }


    public function destroy($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $slider->delete();

        return redirect()->route('adminHomeSlider')->with('success', 'Slider deleted successfully.');
    }

    public function updateStatus(Request $request)
    {
        try {
            // Find the slider by ID
            $slider = HomeSlider::findOrFail($request->id);

            // Update the published status
            $slider->published = $request->published;
            $slider->save();

            // Return a success response
            return response()->json([
                'success' => true,
                'message' => 'Slider status updated successfully.',
            ]);
        } catch (\Exception $e) {
            // Handle errors and return a failure response
            return response()->json([
                'success' => false,
                'message' => 'Failed to update slider status. Please try again.',
            ]);
        }
    }
}
