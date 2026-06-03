<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Item([
            'item_name' => $row['item_name'],
            'description' => $row['description'],
            'status' => $row['status'],
        ]);
    }
}