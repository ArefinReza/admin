<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function Index()
    {
        return Review::all();
    }


    public function index1()
    {
        $reviews = Review::all();
        return view('pages.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('pages.reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'feedback' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        // Handle file upload
        $imagePath = $request->file('client_image')->store('client_images', 'public');

        Review::create([
            'client_name' => $validated['client_name'],
            'client_image' => $imagePath,
            'feedback' => $validated['feedback'],
            'rating' => $validated['rating'],
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('pages.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'feedback' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        if ($request->hasFile('client_image')) {
            // Delete the old image
            Storage::disk('public')->delete($review->client_image);
            // Store the new image
            $imagePath = $request->file('client_image')->store('client_images', 'public');
        } else {
            $imagePath = $review->client_image;
        }

        $review->update([
            'client_name' => $validated['client_name'],
            'client_image' => $imagePath,
            'feedback' => $validated['feedback'],
            'rating' => $validated['rating'],
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Delete the image
        Storage::disk('public')->delete($review->client_image);

        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
