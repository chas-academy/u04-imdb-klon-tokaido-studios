<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'reviewID';

    protected $fillable = [
        'Title', 'description', 'gameID', 'userID',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'gameID');
    }
}
