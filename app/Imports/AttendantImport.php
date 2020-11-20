<?php

namespace App\Imports;

use App\Model\Attendant;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class AttendantImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Attendant([
            'user_id' => Auth::user()->id,
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'position' => $row['position'],
            'gender' => $row['gender'],
            'address_one' => $row['address_one'],
            'address_two' => $row['address_two'],
            'city' => $row['city'],
            'state' => $row['state'],
            'zip_code' => $row['zip_code'],
            'work_phone' => $row['work_phone'],
            'office_phone' => $row['office_phone'],
            'cellular' => $row['cellular'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }
    // public function rules(): array
    // {
    //     return [
    //         'email' => Rule::in(['patrick@maatwebsite.nl']),

    //         // Above is alias for as it always validates in batches
    //         '*.email' => Rule::in(['patrick@maatwebsite.nl']),
    //     ];
    // }
}