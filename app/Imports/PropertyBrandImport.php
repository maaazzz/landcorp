<?php

namespace App\Imports;

use App\Model\PropertyBrand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertyBrandImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PropertyBrand([
            'user_id' => auth()->user()->id,
            'property_brand' => $row['property_brand'],
        ]);
    }
}