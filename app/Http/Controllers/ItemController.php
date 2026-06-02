<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
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
        $items = Item::latest()->get();

        return view('items.index', compact('items'));
    }

    public function create()
    {
        $this->checkAdmin();

        return view('items.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'item_name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Item::create([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('items.index')
            ->with('success', 'Item added successfully.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $this->checkAdmin();

        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $this->checkAdmin();

        $request->validate([
            'item_name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $item->update([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $this->checkAdmin();

        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}