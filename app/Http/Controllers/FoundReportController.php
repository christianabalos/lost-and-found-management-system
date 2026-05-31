<?php

namespace App\Http\Controllers;

use App\Models\FoundReport;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoundReportController extends Controller
{
    public function index()
    {
        $reports = FoundReport::latest()->get();

        return view('found_reports.index', compact('reports'));
    }

    public function create()
    {
        $items = Item::all();

        return view('found_reports.create', compact('items'));
    }

    public function store(Request $request)
    {
        FoundReport::create([
            'user_id' => Auth::id(),
            'item_id' => $request->item_id,
            'date_found' => $request->date_found,
            'location_found' => $request->location_found,
        ]);

        return redirect()->route('found-reports.index');
    }
}