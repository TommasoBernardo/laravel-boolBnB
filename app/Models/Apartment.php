<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }
}
