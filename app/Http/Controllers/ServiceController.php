<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function index1()
    {
        $services = Service::all(); 
        return view('pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('pages.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|file|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        // Store uploaded icon and get the path
        $iconPath = $request->file('icon')->store('services/icons', 'public');

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon_url' => $iconPath,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('pages.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|file|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $iconPath = $service->icon_url;

        // Update icon if a new file is uploaded
        if ($request->hasFile('icon')) {
            // Delete old icon
            Storage::disk('public')->delete($service->icon_url);
            $iconPath = $request->file('icon')->store('services/icons', 'public');
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon_url' => $iconPath,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // public function destroy(Service $service)
    // {
    //     // Delete the associated icon
    //     Storage::disk('public')->delete($service->icon_url);

    //     $service->delete();

    //     return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    // }

    public function destroy($id)
{
    $service = Service::findOrFail($id);
    $service->delete();

    return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
}

    

}
