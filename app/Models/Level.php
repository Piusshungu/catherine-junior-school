<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;
use Mockery\Matcher\Subset;

class Level extends Model
{
    use HasFactory;

    use Uuids;

    protected $guarded = ['id'];
    
    public $incrementing = false;

    public function teacher(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subset::class);
    }
}
