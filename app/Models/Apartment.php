<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'slug', 'title', 'rooms', 'beds', 'bathrooms', 'square_meters', 'visible', 'address', 'cover_image', 'longitude', 'latitude'];

    public function statistic()
    {
        return $this->hasOne(Statistic::class);
    }


    public function services()
    {
        return $this->belongsToMany(Service::class);
    }


    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class)->withTimestamps()->withPivot('end_date');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
