<?php

namespace App\Models\Intranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

#[Guarded([''])]
class Bet extends Model
{
    /** @use HasFactory<\Database\Factories\Intranet\BetFactory> */
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }


}
