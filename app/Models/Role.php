<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\BinaryOp\Spaceship;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    use Uuids;

    protected $primaryKey = 'id';
    public $incrementing = false;


    protected $table = 'roles';


    protected $casts = [
        'id' => 'string'
    ];
}
