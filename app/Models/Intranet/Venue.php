<?php

namespace App\Models\Intranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    /** @use HasFactory<\Database\Factories\Intranet\VenueFactory> */
    use HasFactory;
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

}
