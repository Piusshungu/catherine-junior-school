<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{

    use Importable;

    public function model(array $row)
    {
        return new Student([

            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'registration_number' => $row['registration_number'],
            'registration_year' => $row['registration_year'],
            'dob' => $row['dob'],
            'gender' => $row['gender'],
            'phone_number' => $row['phone_number'],
            
        ]);
    }

    public function rules(): array
    {
        return [

            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'registration_number' => 'required',
            'registration_year' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'phone_number' => 'required'
        ];
    }

    // public function chunkSize(): int
    // {
    //     return 2;
    // }

    
}
