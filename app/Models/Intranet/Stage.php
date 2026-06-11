<?php

namespace App\Models\Intranet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;


class Stage extends Model
{
    /** @use HasFactory<\Database\Factories\Intranet\StageFactory> */
    use HasFactory;
    public function games(): hasMany
{
    return $this->hasMany(Game::class);
}
}
