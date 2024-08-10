<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    public function User(){
        return $this->hasMany(User::class, 'role_id'); // Role Id
    }

    public function Access(){
        return $this->belongsTo(Permission::class, 'pm_id'); // Permission Id
    }
}
