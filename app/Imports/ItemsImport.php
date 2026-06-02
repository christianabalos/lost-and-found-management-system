<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImport implements ToModel
{
    public function model(array $row)
    {
        return new Item([
            'item_name' => $row[0],
            'description' => $row[1],
            'status' => $row[2],
        ]);
    }
}