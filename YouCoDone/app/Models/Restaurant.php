<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'number',
        'email',
        'image',
        'city',
        'address',
        'cuisine_type',
        'capacity',
        'opening_hours',
        'isActive',
        'user_id',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    public function isFavoritedBy($userId)
    {
        return $this->favoritedByUsers()->where('user_id', $userId)->exists();
    }
    public function availabilities()
    {
        return $this->hasMany(Availability::class, 'restaurants_id');
    }
}
