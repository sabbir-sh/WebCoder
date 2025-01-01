<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function index()
    {
        $data['sliders'] = HomeSlider::all();
        $data['title'] = 'Home Slider';
        return view('backend.slider.homeslider', $data);
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created slider in storage.
     */
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

    /**
     * Show the form for editing the specified slider.
     */
    public function edit($id)
    {
        $data['slider'] = HomeSlider::findOrFail($id);
        return view('backend.slider.edit', $data);
    }

    /**
     * Update the specified slider in storage.
     */
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

    /**
     * Remove the specified slider from storage.
     */
    public function destroy($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $slider->delete();

        return redirect()->route('adminHomeSlider')->with('success', 'Slider deleted successfully.');
    }

    public function updateStatus(Request $request)
{
    $slider = HomeSlider::find($request->id);
    if ($slider) {
        $slider->published = $request->published;
        $slider->save();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
}

}
