<?php

namespace App\Http\Controllers;

use App\Models\LostReport;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LostReportController extends Controller
{
    public function index()
    {
        $reports = LostReport::latest()->get();

        return view('lost_reports.index', compact('reports'));
    }

    public function create()
    {
        $items = Item::all();

        return view('lost_reports.create', compact('items'));
    }

    public function store(Request $request)
    {
        LostReport::create([
            'user_id' => Auth::id(),
            'item_id' => $request->item_id,
            'date_lost' => $request->date_lost,
            'location_lost' => $request->location_lost,
        ]);

        return redirect()->route('lost-reports.index');
    }
}