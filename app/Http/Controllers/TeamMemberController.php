<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class TeamMemberController extends Controller
{
    public function index()
    {
        return TeamMember::all();
    }

    public function show($id)
    {
        return TeamMember::findOrFail($id);
    }


    // Display all team members for admin
    public function index1()
    {
        return view('pages.team.index', ['teamMembers' => TeamMember::paginate(10)]);
    }

    // Show the form for creating a new team member
    public function create()
    {
        return view('pages.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'portfolio' => 'nullable|string|max:255',
            'photo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebookLink' => 'nullable|string|max:255',
            'linkedinLink' => 'nullable|string|max:255',
            'phonenumber' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'education' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo_url')) {
            $photoPath = $request->file('photo_url')->store('team_photos', 'public');
        } else {
            $photoPath = null;
        }

        TeamMember::create(array_merge($validated, ['photo_url' => $photoPath]));

        return redirect()->route('team.index')->with('success', 'Team Member added successfully.');
    }

    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('pages.team.edit', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email',
            'portfolio' => 'nullable|string|max:255',
            'photo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebookLink' => 'nullable|string|max:255',
            'linkedinLink' => 'nullable|string|max:255',
            'phonenumber' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'education' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo_url')) {
            Storage::disk('public')->delete($teamMember->photo_url);
            $photoPath = $request->file('photo_url')->store('team_photos', 'public');
        } else {
            $photoPath = $teamMember->photo_url;
        }

        $teamMember->update(array_merge($validated, ['photo_url' => $photoPath]));

        return redirect()->route('team.index')->with('success', 'Team Member updated successfully.');
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);

        if ($teamMember->photo_url) {
            Storage::disk('public')->delete($teamMember->photo_url);
        }

        $teamMember->delete();

        return redirect()->route('team.index')->with('success', 'Team Member deleted successfully.');
    }
}