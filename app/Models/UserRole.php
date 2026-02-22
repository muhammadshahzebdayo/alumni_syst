<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $primaryKey = 'role_id';
    protected $table = 'user_roles';

    protected $fillable = [
        'role_name',
        'description'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
