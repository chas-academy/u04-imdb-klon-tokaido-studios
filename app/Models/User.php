<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'userID';

    protected $fillable = [
        'username', 'email', 'password', 'country', 'is_admin',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function lists()
    {
        return $this->hasMany(UserList::class, 'userID');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'userID');
    }
}