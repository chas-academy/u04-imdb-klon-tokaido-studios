<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $primaryKey = 'listID';

    protected $fillable = [
        'listname', 'description', 'userId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_list', 'listID', 'gameID');
    }
}
