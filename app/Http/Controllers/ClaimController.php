<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    private function checkAdmin()
    {
        if (Auth::user()->role != 'admin')
        {
            abort(403, 'Admins only.');
        }
    }

    public function index()
    {
        $claims = Claim::with(['user', 'item'])
            ->latest()
            ->get();

        return view('claims.index', compact('claims'));
    }

    public function create()
    {
        $items = Item::all();

        return view('claims.create', compact('items'));
    }

    public function store(Request $request)
    {
        $claim = new Claim();

        $claim->user_id = Auth::id();
        $claim->item_id = $request->item_id;
        $claim->claim_status = 'pending';

        $claim->save();

        return redirect()->route('claims.index');
    }

    public function show(Claim $claim)
    {
        //
    }

    public function edit(Claim $claim)
    {
        $this->checkAdmin();

        return view('claims.edit', compact('claim'));
    }

    public function update(Request $request, Claim $claim)
    {
        $this->checkAdmin();

        $claim->claim_status = $request->claim_status;

        $claim->save();

        return redirect()->route('claims.index');
    }

    public function destroy(Claim $claim)
    {
        $this->checkAdmin();

        $claim->delete();

        return redirect()->route('claims.index');
    }
}