<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Uuid;
use App\Models\Course;

class User extends Authenticatable
{
    Use Uuid;

    protected $table = 'users';
   
    protected $primaryKey = 'id';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = ['id', 'email', 'password', 'role', 'last_name', 'first_name',
        'id_code', 'phone_number', 'address', 'image', 'info', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship Teacher <-> Course
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'user_id');
    }
}
