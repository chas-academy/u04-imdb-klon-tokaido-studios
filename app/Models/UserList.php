<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $primaryKey = 'listID';

    protected $fillable = [
        'listname', 'description', 'userID',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_lists', 'listID', 'gameID');
    }
}
