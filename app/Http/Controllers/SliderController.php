<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use PHPUnit\Event\Telemetry\Duration;

class SliderController extends Controller
{

    public function show()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.slider.show', compact('sliders'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'background' => 'required|image|mimes:png,jpg,jpeg,gif|max:20480',
            'description_upper' => 'required',
            'description_middle' => 'required',
            'description_lower' => 'required'
        ]);

        // Create a new slider instance
        $slider = new Slider();

        // Handle file upload
        if ($request->hasFile('background')) {
            $extension = $request->file('background')->extension();
            $filename = date('YmdHis') . '.' . $extension;
            $request->file('background')->move(public_path('uploads/slider/'), $filename);

            // Save the filename in the database
            $slider->background = $filename;
        }

        // Save other form data
        $slider->description_upper = $request->description_upper;
        $slider->description_middle = $request->description_middle;
        $slider->description_lower = $request->description_lower;

        // Save the slider instance to the database
        $slider->save();

        // Redirect to the slider listing page with a success message
        return redirect()->route('slider.show')->with('success', 'Slider added successfully!');
    }

    public function edit($id)
    {
        $sliders = Slider::where('id', $id)->first();

        if (!$sliders) {
            return redirect()->route('slider.show')->with('error', 'Slider not found!');
        }

        return view('admin.slider.edit', compact('sliders'));
    }

    public function update($id, Request $request)
    {
        // Validate the request
        $request->validate([
            'description_upper' => 'required',
            'description_middle' => 'required',
            'description_lower' => 'required',
            'background' => 'sometimes|required|image|mimes:png,jpg,jpeg,gif|max:20480',
        ]);

        // Retrieve the slider instance
        $slider = Slider::where('id', $id)->firstOrFail();

        // Handle file upload
        if ($request->hasFile('background')) {
            // Check if the old file exists and delete it
            $oldBackgroundPath = public_path('uploads/slider/' . $slider->background);
            if (file_exists($oldBackgroundPath) && !empty($slider->background)) {
                unlink($oldBackgroundPath);
            }

            // Save the new file
            $extension = $request->file('background')->extension();
            $filename = date('YmdHis') . '.' . $extension;
            $request->file('background')->move(public_path('uploads/slider/'), $filename);

            // Update the filename in the database
            $slider->background = $filename;
        }

        // Save other form data
        $slider->description_upper = $request->description_upper;
        $slider->description_middle = $request->description_middle;
        $slider->description_lower = $request->description_lower;

        // Save the slider instance to the database
        $slider->save();

        // Redirect to the slider listing page with a success message
        return redirect()->route('slider.show')->with('update_success', 'Slider updated successfully!');
    }


    public function delete($id)
    {
        // Retrieve the slider instance
        $slider = Slider::where('id', $id)->firstOrFail();

        // Check if the old file exists and delete it
        $oldBackgroundPath = public_path('uploads/slider/' . $slider->background);
        if (file_exists($oldBackgroundPath) && !empty($slider->background)) {
            unlink($oldBackgroundPath);
        }

        // Delete the slider record
        $slider->delete();

        // Redirect to the slider listing page with a success message
        return redirect()->route('slider.show')->with('delete_success', 'Slider deleted successfully!');
    }


}
