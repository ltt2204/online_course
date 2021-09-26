<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Traits\Uuid;

class Module extends Model
{
    use Uuid;

    protected $table = 'modules';
   
    protected $primaryKey = 'id';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = ['id', 'name', 'description', 'status', 'subject_id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship between Subject <--> Module
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
