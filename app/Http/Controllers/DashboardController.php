<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Project;
use App\Models\Review;
use App\Models\TeamMember;
use App\Models\ContactMessage;
use App\Models\Todo;
use App\Models\Schedule;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $servicesCount = Service::count();
        $projectCount = Project::count();
        $reviewCount = Review::count();
        $teamMemberCount =TeamMember::count();
        $todos = Todo::orderBy('created_at', 'desc')->get();
        $events = Schedule::orderBy('created_at', 'desc')->get();
        $messages = ContactMessage::select('id', 'name', 'subject', 'email', 'created_at', 'status')
        ->orderBy('id', 'desc')->paginate(3);

        $data = Visitor::select(DB::raw('DAYNAME(created_at) as day'), DB::raw('COUNT(*) as count'))
        ->groupBy('day')
        ->orderBy(DB::raw('FIELD(DAYNAME(created_at), "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")'))
        ->get();

        return view('dashboard', compact('messages','servicesCount','projectCount','reviewCount','teamMemberCount','todos','events','data'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Todo::create(['title' => $request->title]);
        return redirect()->route('dashboard');
    }


    // Delete a todo
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('dashboard')->with('success', 'Todo deleted successfully!');
    }

    public function visitorDash(){
        
    }
}
