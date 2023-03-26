<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'slug', 'title', 'rooms', 'beds', 'bathrooms', 'square_meters', 'visible', 'address', 'cover_image', 'longitude', 'latitude'];



    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
