<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Carbon;
use App\Models\Intranet\Game;
use App\Models\Intranet\Bet;
use Illuminate\Support\Facades\Log;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('profucho:hora', function () {
    $now = Carbon::now()->toImmutable();
    Log::info("Ahora via hora: " . $now->format('Y-m-d H:i:s'));
    $this->comment("Ahora via hora: " . $now->format('Y-m-d H:i:s'));
})->purpose('Display an inspiring quote');

Artisan::command('profucho:lock-games', function () {
    $now = Carbon::now()->toImmutable();
    $nowPlusFive = $now->addMinutes(5);



    $games = Game::where('date', '>=', $now)
        ->where('date', '<=', $nowPlusFive)
        ->where('is_active', true)
        ->get();

    if ($games->isEmpty()) {
      // Log::info("Ahora: " . $now->format('Y-m-d H:i:s'));
      // Log::info("Hasta: " . $nowPlusFive->format('Y-m-d H:i:s'));
      // Log::info('No hay juegos para bloquear ');
        return;
    }
    Log::info("Ahora: " . $now->format('Y-m-d H:i:s'));
    Log::info("Hasta: " . $nowPlusFive->format('Y-m-d H:i:s'));
    Log::info("Juegos a bloquear: " . $games->count());

    DB::beginTransaction();
    try {
        foreach ($games as $game) {
            Bet::where('game_id', $game->id)->update(['status' => true]);
            $game->is_active = false;
            $game->save();
            Log::info("Juegos bloqueado: " . $game->id);
        }
        DB::commit();
        Log::info('✅ Juegos bloqueados correctamente.');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error bloqueando juegos: ' . $e->getMessage());
        $this->error("❌ Error: " . $e->getMessage());
    }

})->purpose('lock edit games')->everyMinute()->withoutOverlapping();
