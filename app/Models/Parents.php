<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\SchoolFeePayment;

class Parents extends Model
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
}
