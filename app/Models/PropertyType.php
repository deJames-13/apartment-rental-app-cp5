<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function propertyListings()
    {
        return $this->hasMany(PropertyListing::class, 'ptype_id');
    }
}
