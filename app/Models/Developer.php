<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = [
        'name', 'phone', 'notes',
        'position', 'evaluation','skills','email'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
