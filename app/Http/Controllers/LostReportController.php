<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\LostReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LostReportController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $reports = LostReport::latest()->get();
        } else {
            $reports = LostReport::where('user_id', Auth::id())
                ->latest()
                ->get();
        }

        return view('lost_reports.index', compact('reports'));
    }

    public function create()
    {
        return view('lost_reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'date_lost' => 'required|date',
            'location_lost' => 'required|string|max:255',
            'item_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('item_image')) {

            $file = $request->file('item_image');

            $imageName = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/lost_items'),
                $imageName
            );

            $imagePath = 'uploads/lost_items/'.$imageName;
        }

        $lostReport = LostReport::create([
    'user_id' => Auth::id(),
    'item_name' => $request->item_name,
    'category' => $request->category,
    'description' => $request->description,
    'item_image' => $imagePath,
    'date_lost' => $request->date_lost,
    'location_lost' => $request->location_lost,
]);

Item::create([
    'item_name' => $request->item_name,
    'category' => $request->category,
    'description' => $request->description,
    'image' => $imagePath,
    'status' => 'lost',
]);

        return redirect()
            ->route('lost-reports.index')
            ->with('success', 'Lost report submitted successfully.');
    }

    public function show(LostReport $lost_report)
    {
        return view('lost_reports.show', compact('lost_report'));
    }

    public function edit(LostReport $lost_report)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $lost_report->user_id != Auth::id()
        ) {
            abort(403);
        }

        return view('lost_reports.edit', compact('lost_report'));
    }

    public function update(Request $request, LostReport $lost_report)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $lost_report->user_id != Auth::id()
        ) {
            abort(403);
        }

        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'date_lost' => 'required|date',
            'location_lost' => 'required|string|max:255',
            'item_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $lost_report->item_name = $request->item_name;
        $lost_report->category = $request->category;
        $lost_report->description = $request->description;
        $lost_report->date_lost = $request->date_lost;
        $lost_report->location_lost = $request->location_lost;

        if ($request->hasFile('item_image')) {

            $file = $request->file('item_image');

            $imageName = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/lost_items'),
                $imageName
            );

            $lost_report->item_image =
                'uploads/lost_items/'.$imageName;
        }

        $lost_report->save();

        return redirect()
            ->route('lost-reports.index')
            ->with('success', 'Lost report updated successfully.');
    }

    public function destroy(LostReport $lost_report)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $lost_report->user_id != Auth::id()
        ) {
            abort(403);
        }

        $lost_report->delete();

        return redirect()
            ->route('lost-reports.index')
            ->with('success', 'Lost report deleted successfully.');
    }
}
