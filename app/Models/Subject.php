<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
use App\Models\Course;
use App\Traits\Uuid;

class Subject extends Model
{
    use Uuid;

    protected $table = 'subjects';
   
    protected $primaryKey = 'id';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = ['id', 'code', 'name', 'description', 'outline', 'image', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship between Subject <--> Module
     */
    public function modules()
    {
        return $this->hasMany(Module::class, 'subject_id');
    }

    /**
     * Relationship between Subject <--> Course
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'subject_id');
    }
}
