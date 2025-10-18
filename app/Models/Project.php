<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'link',
        'order_id',
        'service_id',
        'developer_id',
        'client_id',
        'start_date',
        'delivery_date',
        'price',
        'price_for_company',
        'status',
        'image',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'developer_project');
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'developer_project');
    }
    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
}