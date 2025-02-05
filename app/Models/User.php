<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{

    use AuthenticatableTrait;

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

    protected $hidden = [
        'password',
    ];

    protected $casts = 
    [
        'isAdmin' => 'boolean',
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