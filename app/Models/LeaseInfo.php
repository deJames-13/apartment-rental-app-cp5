<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaseInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    // protected $fillable = [
    //     'unit_id',
    //     'lease_type',
    //     'lease_application_fee',
    //     'lease_fee',
    //     'security_deposit',
    //     'short_term_rent',
    //     'long_term_rent',
    //     'termination_amount',
    //     'is_termination_allowed',
    //     'is_sub_leasing_allowed',
    //     'status',
    // ];


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
