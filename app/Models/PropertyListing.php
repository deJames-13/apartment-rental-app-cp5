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


  // scopeSearch for searching a property listing based on its property_name, location (combination of address, city, region,country), and property type
  // params: $property_name, $location, $property_type
  public function scopeSearch($query, $property_name, $location, $property_type)
  {
    return $query->where('property_name', 'like', '%' . $property_name . '%')
      ->whereHas('propertyType', function ($query) use ($property_type) {
        $query->where('name', 'like', '%' . $property_type . '%');
      })
      ->whereHas('units', function ($query) use ($location) {
        $query->where('address', 'like', '%' . $location . '%')
          ->orWhere('city', 'like', '%' . $location . '%')
          ->orWhere('region', 'like', '%' . $location . '%')
          ->orWhere('country', 'like', '%' . $location . '%');
      });
  }

  // scopeFilter for filtering based on search
  public function scopeFilter($query, $search)
  {
    return $query->where('property_name', 'like', '%' . $search . '%')
      ->orWhereHas('propertyType', function ($query) use ($search) {
        $query->where('name', 'like', '%' . $search . '%');
      })
      ->orWhereHas('units', function ($query) use ($search) {
        $query->where('address', 'like', '%' . $search . '%')
          ->orWhere('city', 'like', '%' . $search . '%')
          ->orWhere('region', 'like', '%' . $search . '%')
          ->orWhere('country', 'like', '%' . $search . '%');
      });
  }
}
