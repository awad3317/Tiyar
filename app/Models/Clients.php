<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
        'logo','link_of_location','location','client_name','phone'
    ];
    
public function projects()
{
    return $this->hasMany(Project::class, 'client_id');
}

}