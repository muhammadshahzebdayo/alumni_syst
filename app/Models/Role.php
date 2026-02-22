<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'user_roles';

    protected $fillable = [
        'name',
        'description'
    ];

    // relation: ek role  more users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}