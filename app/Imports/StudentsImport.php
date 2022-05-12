<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Student([

            'full_name' => $row['full_name'],
            'last_name' => $row['last_name'],
            'registration_number' => $row['registration_number'],
            'dob' => $row['dob'],
            'gender' => $row['gender'],
            'phone_number' => $row['phone_number'],
            
        ]);
    }

    // public function chunkSize(): int
    // {
    //     return 2;
    // }

    
}
