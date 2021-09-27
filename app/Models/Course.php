<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Models\User;
use App\Models\Subject;

class Course extends Model
{
    use Uuid;

    protected $table = 'courses';
   
    protected $primaryKey = 'id';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'id',         // Uuid
        'name',       // Name of the course
        'key',        // The enrolment key
        'content',    // The introduction of the course
        'file',       // The course content in file PDF, DOCX, ..
        'avatar',     // The course image
        'start_date', // Start date
        'end_date',   // End date
        'num_stud',   // Number of students that enroll in the course
        'status',     // Status
        'user_id',    // Teacher uuid
        'subject_id'  // Subject uuid
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship Teacher <-> Course
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship between Subject <--> Course
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

}
