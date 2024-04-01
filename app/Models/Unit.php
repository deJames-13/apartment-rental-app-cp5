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

  public function scopeSearch($query, $unit_name, $location, $unit_type)
  {
    return $query->where('unit_name', 'like', '%' . $unit_name . '%')
      ->whereHas('unitType', function ($query) use ($unit_type) {
        $query->where('name', 'like', '%' . $unit_type . '%');
      })
      ->where(function ($query) use ($location) {
        $query->where('address', 'like', '%' . $location . '%')
          ->orWhere('city', 'like', '%' . $location . '%')
          ->orWhere('region', 'like', '%' . $location . '%')
          ->orWhere('country', 'like', '%' . $location . '%');
      });
  }

  public function scopeFilter($query, $search)
  {
    return $query->where('unit_name', 'like', '%' . $search . '%')
      ->orWhereHas('unitType', function ($query) use ($search) {
        $query->where('name', 'like', '%' . $search . '%');
      })
      ->orWhere(function ($query) use ($search) {
        $query->where('address', 'like', '%' . $search . '%')
          ->orWhere('city', 'like', '%' . $search . '%')
          ->orWhere('region', 'like', '%' . $search . '%')
          ->orWhere('country', 'like', '%' . $search . '%');
      });
  }
}
