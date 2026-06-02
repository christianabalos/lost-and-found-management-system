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
        $report = new LostReport();

        $report->user_id = Auth::id();
        $report->item_id = $request->item_id;
        $report->date_lost = $request->date_lost;
        $report->location_lost = $request->location_lost;

        $report->save();

        return redirect()->route('lost-reports.index');
    }

    public function show(LostReport $lost_report)
    {
        //
    }

    public function edit(LostReport $lost_report)
    {
        $items = Item::all();

        return view('lost_reports.edit', compact('lost_report', 'items'));
    }

    public function update(Request $request, LostReport $lost_report)
    {
        $lost_report->item_id = $request->item_id;
        $lost_report->date_lost = $request->date_lost;
        $lost_report->location_lost = $request->location_lost;

        $lost_report->save();

        return redirect()->route('lost-reports.index');
    }

    public function destroy(LostReport $lost_report)
    {
        $lost_report->delete();

        return redirect()->route('lost-reports.index');
    }
}