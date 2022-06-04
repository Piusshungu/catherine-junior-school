<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Subject extends Model
{
    use HasFactory;

    use Uuids;

    protected $guarded = ['id'];
    
    public $incrementing = false;

    public function levels()
    {
        return $this->belongsToMany(Level::class, 'levels_subjects');
    }

    public function scopeFilter($query, array $filters)
    {

        if(isset($filters['search'])){

            $query->where('subject_name', 'like', '%'. request('search'). '%');
        }
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
