<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Airplan extends Model
{
    use HasFactory;


    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

}
