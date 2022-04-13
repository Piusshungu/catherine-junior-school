<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Attendance extends Model
{
    use HasFactory;

    use Uuids;

    public $incrementing = false;

    protected $guarded = ['id'];
}
