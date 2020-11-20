<?php

namespace App\Imports;

use App\Model\PropertyBuilding;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertyBuildingImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new PropertyBuilding([
            'user_id' => auth()->user()->id,
            'building_name' => $row['building_name'],
        ]);
    }
}