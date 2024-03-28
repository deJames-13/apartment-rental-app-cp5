<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyListing()
    {
        return $this->belongsTo(PropertyListing::class);
    }
}
