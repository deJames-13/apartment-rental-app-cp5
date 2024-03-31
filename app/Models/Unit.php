<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    // protected $fillable = [
    //     'property_id',
    //     'room_number',
    //     'floor_number',
    //     'no_of_bedroom',
    //     'no_of_bathroom',
    //     'status',
    // ];

    public function propertyListing()
    {
        return $this->belongsTo(PropertyListing::class, 'property_id');
    }

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }

    public function unitFeatures()
    {
        return $this->belongsToMany(UnitFeature::class);
    }

    public function leaseInfo()
    {
        return $this->hasOne(LeaseInfo::class);
    }
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, 'unit_file')->withTimestamps();
    }
}
