<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'inquiry_service_id',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'inquiry_service_id');
    }
}
