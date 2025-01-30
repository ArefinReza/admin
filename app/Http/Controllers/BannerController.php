<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{

    public function Index()
    {
        return Banner::all();
    }


    // Display all banners
    public function index1()
    {
        $banners = Banner::all();
        return view('pages.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('pages.banner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'who_we_are' => 'required|string|max:255',
            'intro_video' => 'required|mimes:mp4,avi,mov|max:51200', // Limit video to 50MB
        ]);

        $imagePath = $request->file('banner_image')->store('banner_images', 'public');
        $videoPath = $request->file('intro_video')->store('intro_videos', 'public');

        Banner::create([
            'banner_image' => $imagePath,
            'who_we_are' => $validated['who_we_are'],
            'intro_video' => $videoPath,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('pages.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $validated = $request->validate([
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'who_we_are' => 'required|string|max:255',
            'intro_video' => 'nullable|mimes:mp4,avi,mov|max:51200',
        ]);

        if ($request->hasFile('banner_image')) {
            Storage::disk('public')->delete($banner->banner_image);
            $imagePath = $request->file('banner_image')->store('banner_images', 'public');
        } else {
            $imagePath = $banner->banner_image;
        }

        if ($request->hasFile('intro_video')) {
            Storage::disk('public')->delete($banner->intro_video);
            $videoPath = $request->file('intro_video')->store('intro_videos', 'public');
        } else {
            $videoPath = $banner->intro_video;
        }

        $banner->update([
            'banner_image' => $imagePath,
            'who_we_are' => $validated['who_we_are'],
            'intro_video' => $videoPath,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        Storage::disk('public')->delete($banner->banner_image);
        Storage::disk('public')->delete($banner->intro_video);

        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully.');
    }
}
