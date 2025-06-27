<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'icon_service'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
