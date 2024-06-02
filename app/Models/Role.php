<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Role extends Model
{
    use HasFactory;

    // nom au pluriel car un rôle peut regrouper plusieurs users
// cardinalité 1,n
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
