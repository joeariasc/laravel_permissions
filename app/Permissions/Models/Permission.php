<?php

namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Permissions\Models\Role')->withTimestamps();
    }
}
