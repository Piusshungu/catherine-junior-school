<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Level extends Model
{
    use HasFactory;

    use Uuids;

    public function teacher(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
