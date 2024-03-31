<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    use SoftDeletes;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'username',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // RELATIONS

    public function propertyListings()
    {
        return $this->hasMany(PropertyListing::class, 'landlord_id');
    }
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    public function leaseTransactionsAsTenant()
    {
        return $this->hasMany(LeaseTransaction::class, 'tenant_id');
    }

    public function leaseTransactionsAsLandlord()
    {
        return $this->hasMany(LeaseTransaction::class, 'landlord_id');
    }
    public function leaseApplicationsAsTenant()
    {
        return $this->hasMany(LeaseApplication::class, 'tenant_id');
    }

    public function leaseApplicationsAsLandlord()
    {
        return $this->hasMany(LeaseApplication::class, 'landlord_id');
    }
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class, 'tenant_id');
    }

    public function files()
    {
        return $this->belongsToMany(File::class, 'user_file')->withTimestamps();
    }
}
