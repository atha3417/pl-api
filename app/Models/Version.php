<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'language_id', 'created_at', 'updated_at'];

    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }
}
