<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Valoration;
use App\Models\Room;
use App\Models\Personal;
use App\Models\Game;

class Reserve extends Model
{
    use HasFactory;

    /**
     * Get the client that owns the valoration.
     */
    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function valorations()
    {
        return $this->hasOne(Valoration::class);
    }

    public function rooms()
    {
        return $this->hasOne(Room::class);
    }

    public function staff()
    {
        return $this->hasOne(Personal::class);
    }

    public function games()
    {
        return $this->belongsTo(Game::class);
    }
}
