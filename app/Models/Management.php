<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'managements';
    protected $fillable = [
        'name', 'email', 'phone', 'position', 'skills', 'notes','role','password','ssh'
    ];
    public function sites()
    {
        return $this->hasMany(Management_of_sites::class, 'management_id');
    }

}
