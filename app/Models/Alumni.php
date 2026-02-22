<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // Table name set here
    protected $table = 'alumni';
    protected $primaryKey = 'alumni_id';

    protected $fillable = [
        'user_id',
        'graduation_year',
        'department_id',
        'current_job',
        'company_name',
        'designation',
        'updated_at',
    ];
}
