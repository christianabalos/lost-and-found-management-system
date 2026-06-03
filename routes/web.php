<?php

use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\ItemsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Models\User;
use App\Models\Item;
use App\Models\Claim;
use App\Models\LostReport;
use App\Models\FoundReport;

use App\Exports\ItemsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\LostReportController;
use App\Http\Controllers\FoundReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $user = Auth::user();

    if ($user->role == 'admin') {

        return view('dashboard', [
            'totalUsers' => User::count(),
            'totalItems' => Item::count(),
            'totalClaims' => Claim::count(),
            'totalLostReports' => LostReport::count(),
            'totalFoundReports' => FoundReport::count(),
        ]);

    } else {

        return view('dashboard', [
            'myClaims' => Claim::where('user_id', $user->id)->count(),
            'myLostReports' => LostReport::where('user_id', $user->id)->count(),
            'myFoundReports' => FoundReport::where('user_id', $user->id)->count(),
        ]);

    }

})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Routes
    Route::resource('items', ItemController::class);
    Route::resource('lost-reports', LostReportController::class);
    Route::resource('found-reports', FoundReportController::class);
    Route::resource('claims', ClaimController::class);

    // Export Routes
    Route::get('/items/export/csv', function () {
        return Excel::download(new ItemsExport, 'items.csv');
    })->name('items.export.csv');

    Route::get('/items/export/xlsx', function () {
        return Excel::download(new ItemsExport, 'items.xlsx');
    })->name('items.export.xlsx');

    // PDF Export
Route::get('/items/export/pdf', function () {

    $items = Item::all();

    $pdf = Pdf::loadView('exports.items-pdf', compact('items'));

    return $pdf->download('items.pdf');

})->name('items.export.pdf');

// Import CSV/XLSX
Route::post('/items/import', function (Request $request) {

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(
        $request->file('file')->getPathname()
    );

    $rows = $spreadsheet
        ->getActiveSheet()
        ->toArray();

    foreach ($rows as $row) {

        if (empty($row[1])) {
            continue;
        }

        Item::create([
            'item_name'   => $row[1],
            'description' => $row[2],
            'status'      => $row[4],
        ]);
    }

    return redirect()
        ->route('items.index')
        ->with('success', 'Items imported successfully.');

})->name('items.import');

});

require __DIR__.'/auth.php';