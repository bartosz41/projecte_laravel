<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Valoration;

class Game extends Model
{
    use HasFactory;

    public function valorations()
    {
        return $this->hasMany(Valoration::class);
    }

}
