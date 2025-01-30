<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\Auth;

class SiteInfoController extends Controller
{
    public function index(){
        $result = SiteInfo::get();
        return $result;
    }//end method

    // Display the site info in the admin panel
    public function index1()
    {
        $siteInfo = SiteInfo::first();
        return view('pages.site_info.index', compact('siteInfo'));
    }

    public function create()
    {
        return view('pages.site_info.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sitename' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'about' => 'nullable|string',
            'refund' => 'nullable|string',
            'parchase_guide' => 'nullable|string',
            'privacy' => 'nullable|string',
            'address' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'copyright_text' => 'nullable|string|max:255',
        ]);

        SiteInfo::create($validated);

        return redirect()->route('site_info.index')->with('success', 'Site Info added successfully.');
    }

    public function edit($id)
    {
        $siteInfo = SiteInfo::findOrFail($id);
        return view('pages.site_info.edit', compact('siteInfo'));
    }

    public function update(Request $request, $id)
    {
        $siteInfo = SiteInfo::findOrFail($id);

        $validated = $request->validate([
            'sitename' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'about' => 'nullable|string',
            'refund' => 'nullable|string',
            'parchase_guide' => 'nullable|string',
            'privacy' => 'nullable|string',
            'address' => 'nullable|string',
            'facebook_link' => 'nullable|string',
            'twitter_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'copyright_text' => 'nullable|string|max:255',
        ]);

        $siteInfo->update($validated);

        return redirect()->route('site_info.index')->with('success', 'Site Info updated successfully.');
    }

    public function destroy($id)
    {
        $siteInfo = SiteInfo::findOrFail($id);
        $siteInfo->delete();

        return redirect()->route('site_info.index')->with('success', 'Site Info deleted successfully.');
    }

} 
