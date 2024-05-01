<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id', 'task_type', 'doc_type', 'description'
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
