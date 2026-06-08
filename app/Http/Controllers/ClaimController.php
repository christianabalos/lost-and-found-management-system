<?php

namespace App\Http\Controllers;

use App\Models\LostReport;
use App\Models\Claim;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    private function checkAdmin()
    {
        if (Auth::user()->role != 'admin') {
            abort(403, 'Admins only.');
        }
    }

    public function index()
    {
        if (Auth::user()->role === 'admin') {

            $claims = Claim::with(['user', 'item', 'reviewer'])
                ->latest()
                ->get();

        } else {

            $claims = Claim::with(['item'])
                ->where('user_id', Auth::id())
                ->latest()
                ->get();

        }

        return view('claims.index', compact('claims'));
    }

   public function create()
{
    $lostReports = LostReport::where('user_id', auth()->id())
                    ->latest()
                    ->get();

    return view('claims.create', compact('lostReports'));
}
    public function store(Request $request)
    {
        $request->validate([
            'lost_report_id' => 'required',
            'reason' => 'required|string',
            'unique_identifiers' => 'required|string',
            'date_lost' => 'required|date',
            'location_lost' => 'required|string',
            'proof_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $proofImage = null;

        if ($request->hasFile('proof_image')) {

        $file = $request->file('proof_image');

        $filename = time() . '_' . $file->getClientOriginalName();

        $file->move(
            public_path('uploads/claim_proofs'),
            $filename
    );

    $proofImage = 'uploads/claim_proofs/' . $filename;
}

            $lostReport = LostReport::findOrFail($request->lost_report_id);

        $item = Item::where('item_name', $lostReport->item_name)->first();

        if (!$item) {
            return back()->withErrors([
                'error' => 'Item not found in items table.'
            ]);
        }

            Claim::create([
                'user_id' => Auth::id(),
                'item_id' => $item->id,
                'reason' => $request->reason,
                'unique_identifiers' => $request->unique_identifiers,
                'date_lost' => $request->date_lost,
                'location_lost' => $request->location_lost,
                'proof_image' => $proofImage,
                'claim_status' => 'pending',
            ]);

        return redirect()
            ->route('claims.index')
            ->with('success', 'Claim submitted successfully.');
    }

    public function show(Claim $claim)
    {
        $claim->load(['user', 'item', 'reviewer']);

        return view('claims.show', compact('claim'));
    }

   public function edit(Claim $claim)
{
    if (Auth::user()->role === 'admin') {

    $claim->load(['user', 'item']);

    return view('claims.edit', compact('claim'));
}

    if (
        $claim->user_id != Auth::id() ||
        $claim->claim_status !== 'pending'
    ) {
        abort(403, 'You cannot edit this claim.');
    }

    $claim->load(['item']);

    $items = Item::all();

    return view('claims.edit-user', compact('claim', 'items'));
}

    public function update(Request $request, Claim $claim)
    {
        if (Auth::user()->role === 'admin') {

            $request->validate([
                'claim_status' => 'required|in:pending,under_review,approved,rejected,claimed',
                'admin_notes' => 'nullable|string',
            ]);

            $claim->claim_status = $request->claim_status;
            $claim->admin_notes = $request->admin_notes;
            $claim->reviewed_by = Auth::id();
            $claim->verified_at = now();

            $claim->save();

        } else {

            if (
                $claim->user_id != Auth::id() ||
                $claim->claim_status !== 'pending'
            ) {
                abort(403, 'You cannot edit this claim.');
            }

                        $request->validate([
                'lost_report_id' => 'required|exists:lost_reports,id',
                'reason' => 'required|string',
                'unique_identifiers' => 'required|string',
                'date_lost' => 'required|date',
                'location_lost' => 'required|string',
                'proof_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $claim->item_id = $request->item_id;
            $claim->reason = $request->reason;
            $claim->unique_identifiers = $request->unique_identifiers;
            $claim->date_lost = $request->date_lost;
            $claim->location_lost = $request->location_lost;

               if ($request->hasFile('proof_image')) {

               $file = $request->file('proof_image');

               $filename = time() . '_' . $file->getClientOriginalName();

               $file->move(
                    public_path('uploads/claim_proofs'),
                    $filename
                );

               $claim->proof_image = 'uploads/claim_proofs/' . $filename;
            }

            $claim->save();
        }
        return redirect()
            ->route('claims.index')
            ->with('success', 'Claim updated successfully.');
    }

    public function destroy(Claim $claim)
    {
        if (Auth::user()->role !== 'admin') {

            if (
                $claim->user_id != Auth::id() ||
                $claim->claim_status !== 'pending'
            ) {
                abort(403, 'You cannot delete this claim.');
            }
        }

        $claim->delete();

        return redirect()
            ->route('claims.index')
            ->with('success', 'Claim deleted successfully.');
    }
}