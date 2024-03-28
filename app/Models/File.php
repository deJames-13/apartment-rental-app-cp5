<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function propertyListings()
    {
        return $this->belongsToMany(PropertyListing::class, 'property_file')->withTimestamps();
    }
    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_file')->withTimestamps();
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_file')->withTimestamps();
    }
}
