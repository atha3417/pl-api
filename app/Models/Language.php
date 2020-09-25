<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function versions()
    {
        return $this->hasMany('App\Models\Version');
    }
}
