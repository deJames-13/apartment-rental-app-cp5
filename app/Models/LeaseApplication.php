<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaseApplication extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $guarded = [];
  // protected $fillable = [
  //   'tenant_id',
  //   'landlord_id',
  //   'property_id',
  //   'unit_id',
  //   'rent_amount',
  //   'status',
  //   'title',
  //   'notes',
  //   'tenant_id_card',
  //   'tenant_signature',
  // ];



  public function tenant()
  {
    return $this->belongsTo(User::class, 'tenant_id');
  }
  public function landlord()
  {
    return $this->belongsTo(User::class, 'landlord_id');
  }
  public function propertyListing()
  {
    return $this->belongsTo(PropertyListing::class, 'property_id');
  }
  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }
}
