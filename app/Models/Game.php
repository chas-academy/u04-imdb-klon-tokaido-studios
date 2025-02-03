<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Specificera primärnyckeln (Laravel antar "id" som standard)
    protected $primaryKey = 'gameID';

    // Tillåt mass-assignments för dessa kolumner
    protected $fillable = [
        'title',
        'description',
        'image',
        'trailer',
    ];

    // Relation till Genre (många-till-många)
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre', 'gameID', 'genreID');
    }

    // Relation till Reviews (en-till-många)
    public function reviews()
    {
        return $this->hasMany(Review::class, 'gameID');
    }

    // Relation till UserLists (många-till-många via game_list)
    public function lists()
    {
        return $this->belongsToMany(UserList::class, 'game_lists', 'gameID', 'listID');
    }
}