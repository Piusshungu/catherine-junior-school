<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Student([

            'full_name' => $row['full_name'],
            'registration_number' => $row['registration_number'],
            'dob' => $row['dob'],
            'phone_number' => $row['phone_number'],
            
        ]);
    }
}
