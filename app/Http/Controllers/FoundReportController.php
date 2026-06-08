<?php

namespace App\Http\Controllers;

use App\Models\LostReport;
use App\Models\ItemMatch;
use App\Models\Item;
use App\Models\FoundReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoundReportController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $reports = FoundReport::latest()->get();
        } else {
            $reports = FoundReport::where('user_id', Auth::id())
                ->latest()
                ->get();
        }

        return view('found_reports.index', compact('reports'));
    }

    public function create()
    {
        return view('found_reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'date_found' => 'required|date',
            'location_found' => 'required|string|max:255',
            'item_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

       $imagePath = null;

       if ($request->hasFile('item_image')) {

            $file = $request->file('item_image');

            $imageName = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/found_items'),
                $imageName
            );

            $imagePath = 'uploads/found_items/'.$imageName;
        }

        $foundReport = FoundReport::create([
            'user_id' => Auth::id(),
            'item_id' => null,
            'item_name' => $request->item_name,
            'category' => $request->category,
            'description' => $request->description,
            'item_image' => $imagePath,
            'date_found' => $request->date_found,
            'location_found' => $request->location_found,
        ]);
        
        $item = Item::create([
    'item_name' => $request->item_name,
    'category' => $request->category,
    'description' => $request->description,
    'image' => $imagePath,
    'status' => 'found',
]);

        $lostReports = LostReport::where(
    'category',
    $foundReport->category
)->get();

foreach ($lostReports as $lostReport) {

    $score = 0;

    if (
        strtolower($lostReport->category) ===
        strtolower($foundReport->category)
    ) {
        $score += 50;
    }

    similar_text(
        strtolower($lostReport->item_name),
        strtolower($foundReport->item_name),
        $percent
    );

    if ($percent >= 40) {
        $score += 50;
    }

    if ($score >= 70) {

        ItemMatch::firstOrCreate(
            [
                'lost_report_id' => $lostReport->id,
                'found_report_id' => $foundReport->id,
            ],
            [
                'match_score' => $score,
                'status' => 'pending',
            ]
        );

    }
}

        return redirect()
            ->route('found-reports.index')
            ->with('success', 'Found report submitted successfully.');
    }

    public function show(FoundReport $found_report)
    {
        return view('found_reports.show', compact('found_report'));
    }

    public function edit(FoundReport $found_report)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $found_report->user_id != Auth::id()
        ) {
            abort(403);
        }

        $items = Item::all();

        return view(
            'found_reports.edit',
            compact('found_report', 'items')
        );
    }

    public function update(Request $request, FoundReport $found_report)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $found_report->user_id != Auth::id()
        ) {
            abort(403);
        }

        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'date_found' => 'required|date',
            'location_found' => 'required|string|max:255',
            'item_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $found_report->item_name = $request->item_name;
        $found_report->category = $request->category;
        $found_report->description = $request->description;
        $found_report->date_found = $request->date_found;
        $found_report->location_found = $request->location_found;

       if ($request->hasFile('item_image')) {

         $file = $request->file('item_image');

         $imageName = time().'_'.$file->getClientOriginalName();

         $file->move(
            public_path('uploads/found_items'),
            $imageName
         );

         $found_report->item_image =
            'uploads/found_items/'.$imageName;
        }

        $found_report->save();

        return redirect()
            ->route('found-reports.index')
            ->with('success', 'Found report updated successfully.');
    }

    public function destroy(FoundReport $found_report)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $found_report->user_id != Auth::id()
        ) {
            abort(403);
        }

        $found_report->delete();

        return redirect()
            ->route('found-reports.index')
            ->with('success', 'Found report deleted successfully.');
    }
}
