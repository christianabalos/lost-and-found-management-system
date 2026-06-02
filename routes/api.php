<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Item;
use App\Models\Claim;
use App\Models\LostReport;
use App\Models\FoundReport;

/*
|--------------------------------------------------------------------------
| ITEMS API
|--------------------------------------------------------------------------
*/

Route::get('/items', function () {
    return response()->json(Item::all());
});

Route::post('/items', function (Request $request) {

    $item = Item::create([
        'item_name'   => $request->item_name,
        'description' => $request->description,
        'status'      => $request->status,
    ]);

    return response()->json($item, 201);
});

Route::match(['put', 'patch'], '/items/{id}', function (Request $request, $id) {

    $item = Item::findOrFail($id);

    if ($request->has('item_name')) {
        $item->item_name = $request->item_name;
    }

    if ($request->has('description')) {
        $item->description = $request->description;
    }

    if ($request->has('status')) {
        $item->status = $request->status;
    }

    $item->save();

    return response()->json([
        'message' => 'Item updated successfully',
        'item' => $item
    ]);
});

Route::delete('/items/{id}', function ($id) {

    $item = Item::findOrFail($id);

    $item->delete();

    return response()->json([
        'message' => 'Item deleted successfully'
    ]);
});

/*
|--------------------------------------------------------------------------
| CLAIMS API
|--------------------------------------------------------------------------
*/

Route::get('/claims', function () {
    return response()->json(Claim::all());
});

/*
|--------------------------------------------------------------------------
| LOST REPORTS API
|--------------------------------------------------------------------------
*/

Route::get('/lost-reports', function () {
    return response()->json(LostReport::all());
});

/*
|--------------------------------------------------------------------------
| FOUND REPORTS API
|--------------------------------------------------------------------------
*/

Route::get('/found-reports', function () {
    return response()->json(FoundReport::all());
});