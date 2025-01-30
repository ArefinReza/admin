<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Schedule;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        $events = Schedule::orderBy('created_at', 'desc')->get();
        return view('pages.todos.index', compact('todos','events'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Todo::create(['title' => $request->title]);
        return redirect()->route('todos.index');
    }
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
    }

    // sheduel start 
    public function storeSchedule(Request $request)
{
    $validated = $request->validate([
        'event_title' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required',
        'location' => 'required|string|max:255',
        'attendees' => 'required|string|max:255',
    ]);

    Schedule::create([
        'event_title' => $validated['event_title'],
        'date' => $validated['date'],
        'time' => $validated['time'],
        'location' => $validated['location'],
        'attendees' => $validated['attendees'],
    ]);

    return redirect()->route('todos.index')->with('success', 'Event created successfully.');
}

public function destroySchedule($id)
{
    $event = Schedule::findOrFail($id);
    $event->delete();

    return redirect()->route('todos.index')->with('success', 'Event deleted successfully.');
}

}
