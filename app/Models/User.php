<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'userID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable =
    [
        'username', 
        'email', 
        'password', 
        'country', 
        'isAdmin',
    ];

    protected $hidden =
    [
        'password', 
        'remember_token',
    ];

    protected $casts = 
    [
        'isAadmin' => 'boolean',
    ];

    public function lists()
    {
        return $this->hasMany(UserList::class, 'userId');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'userID');
    }
}