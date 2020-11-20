<?php

namespace App\Imports;

use App\Model\RoomType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoomTypeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new RoomType([
            'user_id' => auth()->user()->id,
            'room_type' => $row['room_type'],
        ]);
    }
}