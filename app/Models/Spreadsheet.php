<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spreadsheet extends Model
{
    protected $fillable = [
        'name', 'file_path', 'document_type', 'docname', 'semester',
    ];

    /**
     * Get the formatted created_at attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d H:i:s', strtotime($value));
    }

    // Define any additional model logic or relationships here
}

