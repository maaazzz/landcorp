<?php

namespace App\Imports;

use App\Model\Room;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoomImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Room([
            'user_id' => auth()->user()->id,
            'property_id' => $row['property_id'],
            'room_type_id' => $row['room_type_id'],
            'room_name' => $row['room_name'],
            'status' => $row['status'],
        ]);
    }
}