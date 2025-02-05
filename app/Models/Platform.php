<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $primaryKey = "platformID";
    protected $fillable = ["name"];

    // Relation till Game-modellen (många till många)
    public function games()
    {
        return $this->belongsToMany(Game::class,'games_platforms', 'platformID', 'gameID');
    }
}
