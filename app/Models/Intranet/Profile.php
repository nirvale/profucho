<?php

namespace App\Models\Intranet;

use Database\Factories\Intranet\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

#[Guarded([''])]
class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    // protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
