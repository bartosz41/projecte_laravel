<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Valoration;
use App\Models\Reserve;

class Game extends Model
{
    use HasFactory;

    public function valorations()
    {
        return $this->hasMany(Valoration::class);
    }

    public function reserves()
    {
        return $this->hasManu(Reserve::class);
    }

}
