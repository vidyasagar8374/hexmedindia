<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function franchisedetails(){
        return $this->hasOne(FranchiseOwnerDetails::class, 'franchise_id', 'id');
    }
    public function boydetails(){
        return $this->hasOne(Franchiseboy::class, 'user_id', 'id');
    }
    public function requestdetails(){
        return $this->hasOne(BookedTest::class, 'franchise_id', 'id')->where('request_raised', 1)->where('status', 'collection pending');
    }
    public function franchiseCount(){
        return $this->hasMany(franchiseboys::class, 'user_id', 'id');
    }
    public function tolietimages(){
         return $this->hasMany(ToiletImages::class, 'franchise_id', 'id');
    }
}
