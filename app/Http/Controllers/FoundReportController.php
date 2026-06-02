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
        $report = new FoundReport();

        $report->user_id = Auth::id();
        $report->item_id = $request->item_id;
        $report->date_found = $request->date_found;
        $report->location_found = $request->location_found;

        $report->save();

        return redirect()->route('found-reports.index');
    }

    public function show(FoundReport $found_report)
    {
        //
    }

    public function edit(FoundReport $found_report)
    {
        $items = Item::all();

        return view('found_reports.edit', compact('found_report', 'items'));
    }

    public function update(Request $request, FoundReport $found_report)
    {
        $found_report->item_id = $request->item_id;
        $found_report->date_found = $request->date_found;
        $found_report->location_found = $request->location_found;

        $found_report->save();

        return redirect()->route('found-reports.index');
    }

    public function destroy(FoundReport $found_report)
    {
        $found_report->delete();

        return redirect()->route('found-reports.index');
    }
}