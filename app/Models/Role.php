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

    protected $keyType='string';
    
    public $incrementing = false;

    const HEADMASTER = 'Head Master';

    const HEADMISTRESS = 'Head Mistress';

    const TEACHER = 'Teacher';

    const ADMINSTRATOR = 'Adminstrator';


    protected $table = 'roles';


    protected $casts = [
        'id' => 'string'
    ];

    public function scopeFilter($query, array $filters)
    {

        if(isset($filters['search'])){

            $query->where('name', 'like', '%'. request('search'). '%');
        }
    }
}
