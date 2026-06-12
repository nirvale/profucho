<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intranet\Game;
use App\Models\Intranet\Team;

class UpdateGamesRoundSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener todos los equipos
        $teams = Team::all()->keyBy('id');

        // Solo actualizar juegos de fase de grupos (stage_id = 1)
        $games = Game::where('stage_id', 1)->get();

        $updatedCount = 0;

        foreach ($games as $game) {
            $homeTeam = $teams[$game->home_team_id] ?? null;
            $awayTeam = $teams[$game->away_team_id] ?? null;

            // Verificar que ambos equipos existan y estén en el mismo grupo
            if ($homeTeam && $awayTeam && $homeTeam->group === $awayTeam->group) {
                $round = $this->calculateRound($homeTeam->position, $awayTeam->position);

                if ($round > 0) {
                    $game->round = $round;
                    $game->save();
                    $updatedCount++;
                    $this->command->info("Game {$game->id}: {$homeTeam->name}({$homeTeam->position}) vs {$awayTeam->name}({$awayTeam->position}) -> Round {$round}");
                }
            }
        }

        // $this->command->info("\n✓ Total games updated: {$updatedCount}");

        Game::where('stage_id', 2)->update(['round' => 4]);
        Game::where('stage_id', 3)->update(['round' => 5]);
        Game::where('stage_id', 4)->update(['round' => 6]);
        Game::where('stage_id', 5)->update(['round' => 7]);
        Game::where('stage_id', 6)->update(['round' => 8]);
        Game::where('stage_id', 7)->update(['round' => 9]);

        $this->command->info("\n✓ Total games updated (Stage 1): {$updatedCount}");
        $this->command->info("✓ Other stages updated successfully.");
    }

    private function calculateRound($homePos, $awayPos): int
    {
        // Ronda 1: partidos 1vs2 y 3vs4
        if (($homePos == 1 && $awayPos == 2) || ($homePos == 2 && $awayPos == 1)) {
            return 1;
        }
        if (($homePos == 3 && $awayPos == 4) || ($homePos == 4 && $awayPos == 3)) {
            return 1;
        }

        // Ronda 2: partidos 1vs3 y 4vs2
        if (($homePos == 1 && $awayPos == 3) || ($homePos == 3 && $awayPos == 1)) {
            return 2;
        }
        if (($homePos == 4 && $awayPos == 2) || ($homePos == 2 && $awayPos == 4)) {
            return 2;
        }

        // Ronda 3: partidos 4vs1 y 2vs3
        if (($homePos == 4 && $awayPos == 1) || ($homePos == 1 && $awayPos == 4)) {
            return 3;
        }
        if (($homePos == 2 && $awayPos == 3) || ($homePos == 3 && $awayPos == 2)) {
            return 3;
        }

        return 0;
    }
}
