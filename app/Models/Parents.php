<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\SchoolFeePayment;

class Parents extends Authenticatable
{
    use HasFactory;

    use Uuids, Notifiable;

    protected $guarded = ['id'];

    public $incrementing = false;

    public function scopeFilter($query, array $filters)
    {

        if(isset($filters['search'])){

            $query->where('name', 'like', '%'. request('search'). '%')

            ->orWhere('email', 'like', '%'. request('search'). '%')

            ->orWhere('phone_number', 'like', '%'. request('search'). '%');
        }
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function setPhoneNumberAttribute($phone_number)
    {
       
        if(substr($phone_number,0,1) === "0" || substr($phone_number,0,1) === "+"){

            $phone_number = substr($phone_number,1);
 
            $this->attributes['phone_number'] = "+255". $phone_number;
            
        }
        
        if (substr($phone_number,0,3) === "255") {

            $this->attributes['phone_number'] = "+". $phone_number;

         }
        
    }
    /**
     * Route notifications for the Africa's Talking channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForAfricasTalking($notification)
    {
        return $this->phone_number;
    }

    public function routeNotificationForBeem()
    {
        // Country code, area code and number without symbols or spaces e.g: 255713001001
        return $this->phone_number;
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'parent_student', 'parent_id');
    }
}
 