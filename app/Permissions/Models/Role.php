<?php

namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const REGISTERED_USER = 2;

    protected $fillable = [
        'name', 'slug', 'description', 'full_access',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permissions\Models\Permission')->withTimestamps();
    }
}
