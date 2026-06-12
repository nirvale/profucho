<?php

namespace App\Models\Intranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\Intranet\TeamsFactory> */
    use HasFactory;

    public function group(): HasOne
    {
        return $this->hasOne(Group::class);
    }
}
