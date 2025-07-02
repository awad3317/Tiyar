<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management_of_sites extends Model
{
    protected $fillable = [
        'db_user',
        'db_password',
        'db_username',
        'db_name',
        'client_name',
        'domain',
        'notes',
        'ssh',
        'server_password',
        'site_user',
        'management_id',
    ];

    public function management()
    {
        return $this->belongsTo(Management::class, 'management_id');
    }

}
