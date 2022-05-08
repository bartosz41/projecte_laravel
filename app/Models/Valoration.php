<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Client;

class Valoration extends Model
{
    use HasFactory;

    /**
     * Get the game that owns the valoration.
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Get the client that owns the valoration.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
