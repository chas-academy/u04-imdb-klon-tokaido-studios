<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword; // ✅ Lägg till detta
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait; // ✅ Lägg till detta
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable; // ✅ Lägg till detta

class User extends Model implements Authenticatable, CanResetPassword // ✅ Lägg till CanResetPassword
{
    use AuthenticatableTrait, CanResetPasswordTrait, Notifiable; // ✅ Lägg till Notifiable & CanResetPasswordTrait

    use HasFactory, Notifiable;

    protected $primaryKey = 'userID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'username', 
        'email', 
        'password', 
        'country', 
        'isAdmin',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
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