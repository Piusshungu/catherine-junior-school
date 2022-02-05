<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\Student;
use App\Http\Controllers\StudentsController;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StudentsExcelProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $student;

    public function __construct(Student $studentsData)
    {
        $this->studentsData = $studentsData->withoutRelations();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StudentsController $students)
    {
        
    }
}
