<?php

namespace App\Models\Intranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\Intranet\GameFactory> */
    use HasFactory;

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    public function hometeam(): BelongsTo
    {
        return $this->belongsTo(Team::class,'home_team_id');
    }

    public function awayteam(): BelongsTo
    {
        return $this->belongsTo(Team::class,'away_team_id');
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }
}
