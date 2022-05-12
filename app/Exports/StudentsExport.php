<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromQuery, WithHeadings
{

    use Importable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Student::all();
    // }


    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return Student::query()->where('id', $this->id);
    }

    public function headings(): array
    {
        return [

            '#',
            'First Name',
            'Last Name',
            'Number',
            'Date Of Birth',
            'Phone',
            'Created',
            'Updated',
            'Deleted',
            'Gender',
            'Year',
            'Level',

        ];
    }


}
