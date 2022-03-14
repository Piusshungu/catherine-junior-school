<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Uuids;

    public const TYPE_HEADMASTER = 'Head Master';
    public const TYPE_ADMINISTRATOR = 'Administrator';
    public const TYPE_HEADMISTRESS = 'Head Mistress';
    public const TYPE_TEACHER = 'Teacher';



    public const TYPES = [
        self::TYPE_HEADMASTER     => self::TYPE_HEADMASTER,
        self::TYPE_ADMINISTRATOR => self::TYPE_ADMINISTRATOR,
        self::TYPE_HEADMISTRESS => self::TYPE_HEADMISTRESS,
        self::TYPE_TEACHER => self::TYPE_TEACHER,

    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttributes($password){
        
        $this->userDetails['password'] = bcrypt($password);
    }

    public function setPhoneNumberAttribute($phone_number)
    {
      
        if(substr($phone_number,0,1) === "0" || substr($phone_number,0,1) === "+"){

            $phone_number = substr($phone_number,1);
 
            $this->attributes['phone_number'] =  "+255". $phone_number;
              
        }
        
        if (substr($phone_number,0,3) === "255") {

            $this->attributes['phone_number'] = "+". $phone_number;

         }
    }
}
