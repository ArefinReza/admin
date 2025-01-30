<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function logVisitor(Request $request)
    {
        // Get the visitor's IP address
        $ipAddress = $request->ip();

        // Get the region using the ip-api.com API
        $ipinfoUrl = "http://ip-api.com/json/{$ipAddress}";
        $response = file_get_contents($ipinfoUrl);
        $responseData = json_decode($response, true);
        $region = $responseData['regionName'] ?? 'Unknown';

        // Capture other data
        $destinationPort = $request->input('destination_port', 80); // Default to port 80 if not provided
        $userAgent = $request->header('User-Agent');

        // Insert data into the database
        DB::table('visitors')->insert([
            'ip_address' => $ipAddress,
            'region' => $region,
            'destination_port' => $destinationPort,
            'user_agent' => $userAgent,
            'created_at' => now()
        ]);

        return response()->json(['message' => 'Visitor logged successfully']);
    }
    public function index()
    {
        // Paginate visitors in descending order, 10 items per page
        $visitors = DB::table('visitors')->orderBy('created_at', 'desc')->paginate(10);

        // Aggregate data for the chart
        $dailyVisitors = DB::table('visitors')
            ->whereDate('created_at', Carbon::today())
            ->count();

        $weeklyVisitors = DB::table('visitors')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $monthlyVisitors = DB::table('visitors')
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $yearlyVisitors = DB::table('visitors')
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
            
        $data = Visitor::select(DB::raw('DAYNAME(created_at) as day'), DB::raw('COUNT(*) as count'))
        ->groupBy('day')
        ->orderBy(DB::raw('FIELD(DAYNAME(created_at), "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")'))
        ->get();

    // return response()->json($data);

        return view('pages.visitors.index', compact('visitors', 'dailyVisitors', 'weeklyVisitors', 'monthlyVisitors', 'yearlyVisitors','data'));
    }
    
}
