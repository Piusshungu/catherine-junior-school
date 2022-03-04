<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Payment extends Model
{
    use HasFactory;

    use Uuids;

    protected $table =  'payment';

    protected $guarded = ['id'];

    public $incrementing = false;

    public function students()
    {
        return $this->belongsTo(Student::class);
    }

}
