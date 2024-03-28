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
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
