<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class Student extends Model
{
    use HasFactory;

    use Uuids;


    protected $guarded = ['id'];

    public $incrementing = false;

    public function scopeFilter($query, array $filters)
    {

        if(isset($filters['search'])){

            $query->where('full_name', 'like', '%'. request('search'). '%');
        }
    }

    public function getPhoneNumberAttribute()
    {
      
        if(substr($this->attributes['phone_number'],0,1) === "0" || substr($this->attributes['phone_number'],0,1) === "+"){
 
            return "+255". substr($this->attributes['phone_number'],1);
            
        }

        if (substr($this->attributes['phone_number'], 0, 3) === "255") {

            return "+". $this->attributes['phone_number'];
        }

        return "+255" . $this->attributes['phone_number'];

    }
}
