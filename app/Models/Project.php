<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'type', 'link'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
