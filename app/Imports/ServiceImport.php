<?php

namespace App\Imports;

use App\Model\Service;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServiceImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Service([
            'user_id' => auth()->user()->id,
            'service_name' => $row['service_name'],
        ]);
    }
}