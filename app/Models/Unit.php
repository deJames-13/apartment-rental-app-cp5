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
  // TODO: Property Name
  // TODO: Unit Code
  // TODO: Floor Number
  // TODO: No of Bedroom
  // TODO Status


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

  public function scopeSearch($query, $unit_code, $location, $property_type)
  {
    return $query->where('unit_code', 'like', '%' . $unit_code . '%')
      ->whereHas('property', function ($query) use ($location, $property_type) {
        $query->where('location', 'like', '%' . $location . '%')
          ->where('type', 'like', '%' . $property_type . '%');
      });
  }

  public function scopeFilter($query, $search)
  {
    return $query->where('unit_code', 'like', '%' . $search . '%')
      ->orWhereHas('property', function ($query) use ($search) {
        $query->where('location', 'like', '%' . $search . '%')
          ->orWhere('type', 'like', '%' . $search . '%');
      });
  }
}
