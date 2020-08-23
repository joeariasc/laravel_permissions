<?php

namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'full_access',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
