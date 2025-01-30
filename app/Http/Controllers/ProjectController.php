<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function show($id)
    {
        return Project::findOrFail($id);
    }

    public function index1()
    {
        // $projects = Project::all();
        $projects = Project::paginate(10);
        // Ensure images is an array for each project
        foreach ($projects as $project) {
            if (is_string($project->images)) {
                $project->images = json_decode($project->images, true);
            }
        }

        return view('pages.projects.index', compact('projects'));
    }
    // end method


    // Show the form for creating a new project
    public function create()
    {
        if (Auth::user()->role !== 'user') {
            return view('pages.projects.create');
        }
        return redirect()->route('pages.projects.index')->with('error', 'Access denied');
    }

    // Store a new project in the database
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'user') {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('projects', 'public');
                    $imagePaths[] = $path;
                }
            }

            Project::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'images' => $imagePaths,
            ]);

            return redirect()->route('projects.index')->with('success', 'Project created successfully');
        }
        return redirect()->route('projects.index')->with('error', 'Access denied');
    }

    // Display edit form
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('pages.projects.edit', compact('project'));
    }

    // Update the project
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate uploaded images
        ]);

        // Handle images upload
        $uploadedImages = $project->images ?? [];
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $uploadedImages[] = $path;
            }
        }

        // Update project
        $project->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'images' => $uploadedImages,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    // Delete the project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete associated images
        if ($project->images) {
            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
