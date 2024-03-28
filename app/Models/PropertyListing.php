<?php

namespace App\Models;

use App\Models\MaintenanceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyListing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'ptype_id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'property_id');
    }
    public function accessibilities()
    {
        return $this->hasMany(Accessibility::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    public function leaseTransactions()
    {
        return $this->hasMany(LeaseTransaction::class, 'property_id');
    }
    public function leaseApplications()
    {
        return $this->hasMany(LeaseApplication::class, 'property_id');
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class, 'property_id');
    }

    // FILE
    public function files()
    {
        return $this->belongsToMany(File::class, 'property_file')->withTimestamps();
    }
}
