<?php

namespace App\Imports;

use App\Model\PropertyType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertyTypeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PropertyType([
            'user_id' => auth()->user()->id,
            'property_type' => $row['property_type'],
        ]);
    }
}