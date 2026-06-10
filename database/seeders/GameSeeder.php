<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intranet\Game;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // $games = [
      //     // Fase de grupos - Partido 1 al 72
      //     ['id' => 1, 'date' => '2026-06-12 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 1, 'away_team_id' => 4, 'home_g_team_id' => 'A1', 'away_g_team_id' => 'A2', 'venue_id' => 14],
      //     ['id' => 2, 'date' => '2026-06-12 08:00:00', 'time' => '08:00:00','stage_id' =>'1', 'home_team_id' => 2, 'away_team_id' => 3, 'home_g_team_id' => 'A3', 'away_g_team_id' => 'A4', 'venue_id' => 15],
      //     ['id' => 3, 'date' => '2026-06-13 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 6, 'away_team_id' => 8, 'home_g_team_id' => 'B1', 'away_g_team_id' => 'B2', 'venue_id' => 2],
      //     ['id' => 4, 'date' => '2026-06-13 07:00:00', 'time' => '07:00:00','stage_id' =>'1', 'home_team_id' => 13, 'away_team_id' => 16, 'home_g_team_id' => 'D1', 'away_g_team_id' => 'D2', 'venue_id' => 8],
      //     ['id' => 5, 'date' => '2026-06-14 07:00:00', 'time' => '07:00:00','stage_id' =>'1', 'home_team_id' => 12, 'away_team_id' => 11, 'home_g_team_id' => 'C3', 'away_g_team_id' => 'C4', 'venue_id' => 12],
      //     ['id' => 6, 'date' => '2026-06-14 10:00:00', 'time' => '10:00:00','stage_id' =>'1', 'home_team_id' => 15, 'away_team_id' => 14, 'home_g_team_id' => 'D3', 'away_g_team_id' => 'D4', 'venue_id' => 1],
      //     ['id' => 7, 'date' => '2026-06-14 04:00:00', 'time' => '04:00:00','stage_id' =>'1', 'home_team_id' => 9, 'away_team_id' => 10, 'home_g_team_id' => 'C1', 'away_g_team_id' => 'C2', 'venue_id' => 3],
      //     ['id' => 8, 'date' => '2026-06-14 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 7, 'away_team_id' => 5, 'home_g_team_id' => 'B3', 'away_g_team_id' => 'B4', 'venue_id' => 11],
      //     ['id' => 9, 'date' => '2026-06-15 05:00:00', 'time' => '05:00:00','stage_id' =>'1', 'home_team_id' => 19, 'away_team_id' => 18, 'home_g_team_id' => 'E3', 'away_g_team_id' => 'E4', 'venue_id' => 9],
      //     ['id' => 10, 'date' => '2026-06-14 23:00:00', 'time' => '23:00:00','stage_id' =>'1', 'home_team_id' => 17, 'away_team_id' => 20, 'home_g_team_id' => 'E1', 'away_g_team_id' => 'E2', 'venue_id' => 6],
      //     ['id' => 11, 'date' => '2026-06-15 02:00:00', 'time' => '02:00:00','stage_id' =>'1', 'home_team_id' => 21, 'away_team_id' => 22, 'home_g_team_id' => 'F1', 'away_g_team_id' => 'F2', 'venue_id' => 5],
      //     ['id' => 12, 'date' => '2026-06-15 08:00:00', 'time' => '08:00:00','stage_id' =>'1', 'home_team_id' => 23, 'away_team_id' => 24, 'home_g_team_id' => 'F3', 'away_g_team_id' => 'F4', 'venue_id' => 16],
      //     ['id' => 13, 'date' => '2026-06-16 04:00:00', 'time' => '04:00:00','stage_id' =>'1', 'home_team_id' => 31, 'away_team_id' => 30, 'home_g_team_id' => 'H3', 'away_g_team_id' => 'H4', 'venue_id' => 13],
      //     ['id' => 14, 'date' => '2026-06-15 22:00:00', 'time' => '22:00:00','stage_id' =>'1', 'home_team_id' => 29, 'away_team_id' => 32, 'home_g_team_id' => 'H1', 'away_g_team_id' => 'H2', 'venue_id' => 7],
      //     ['id' => 15, 'date' => '2026-06-16 07:00:00', 'time' => '07:00:00','stage_id' =>'1', 'home_team_id' => 26, 'away_team_id' => 28, 'home_g_team_id' => 'G3', 'away_g_team_id' => 'G4', 'venue_id' => 8],
      //     ['id' => 16, 'date' => '2026-06-16 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 25, 'away_team_id' => 27, 'home_g_team_id' => 'G1', 'away_g_team_id' => 'G2', 'venue_id' => 10],
      //     ['id' => 17, 'date' => '2026-06-17 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 33, 'away_team_id' => 34, 'home_g_team_id' => 'I1', 'away_g_team_id' => 'I2', 'venue_id' => 3],
      //     ['id' => 18, 'date' => '2026-06-17 04:00:00', 'time' => '04:00:00','stage_id' =>'1', 'home_team_id' => 36, 'away_team_id' => 35, 'home_g_team_id' => 'I3', 'away_g_team_id' => 'I4', 'venue_id' => 12],
      //     ['id' => 19, 'date' => '2026-06-17 07:00:00', 'time' => '07:00:00','stage_id' =>'1', 'home_team_id' => 37, 'away_team_id' => 39, 'home_g_team_id' => 'J1', 'away_g_team_id' => 'J2', 'venue_id' => 4],
      //     ['id' => 20, 'date' => '2026-06-17 10:00:00', 'time' => '10:00:00','stage_id' =>'1', 'home_team_id' => 38, 'away_team_id' => 40, 'home_g_team_id' => 'J3', 'away_g_team_id' => 'J4', 'venue_id' => 11],
      //     ['id' => 21, 'date' => '2026-06-18 05:00:00', 'time' => '05:00:00','stage_id' =>'1', 'home_team_id' => 48, 'away_team_id' => 47, 'home_g_team_id' => 'L3', 'away_g_team_id' => 'L4', 'venue_id' => 2],
      //     ['id' => 22, 'date' => '2026-06-18 02:00:00', 'time' => '02:00:00','stage_id' =>'1', 'home_team_id' => 45, 'away_team_id' => 46, 'home_g_team_id' => 'L1', 'away_g_team_id' => 'L2', 'venue_id' => 5],
      //     ['id' => 23, 'date' => '2026-06-17 23:00:00', 'time' => '23:00:00','stage_id' =>'1', 'home_team_id' => 41, 'away_team_id' => 43, 'home_g_team_id' => 'K1', 'away_g_team_id' => 'K2', 'venue_id' => 6],
      //     ['id' => 24, 'date' => '2026-06-18 08:00:00', 'time' => '08:00:00','stage_id' =>'1', 'home_team_id' => 44, 'away_team_id' => 42, 'home_g_team_id' => 'K3', 'away_g_team_id' => 'K4', 'venue_id' => 14],
      //     ['id' => 25, 'date' => '2026-06-18 22:00:00', 'time' => '22:00:00','stage_id' =>'1', 'home_team_id' => 3, 'away_team_id' => 4, 'home_g_team_id' => 'A4', 'away_g_team_id' => 'A2', 'venue_id' => 7],
      //     ['id' => 26, 'date' => '2026-06-19 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 5, 'away_team_id' => 8, 'home_g_team_id' => 'B4', 'away_g_team_id' => 'B2', 'venue_id' => 8],
      //     ['id' => 27, 'date' => '2026-06-19 04:00:00', 'time' => '04:00:00','stage_id' =>'1', 'home_team_id' => 6, 'away_team_id' => 7, 'home_g_team_id' => 'B1', 'away_g_team_id' => 'B3', 'venue_id' => 1],
      //     ['id' => 28, 'date' => '2026-06-19 07:00:00', 'time' => '07:00:00','stage_id' =>'1', 'home_team_id' => 1, 'away_team_id' => 2, 'home_g_team_id' => 'A1', 'away_g_team_id' => 'A3', 'venue_id' => 15],
      //     ['id' => 29, 'date' => '2026-06-20 06:30:00', 'time' => '06:30:00','stage_id' =>'1', 'home_team_id' => 9, 'away_team_id' => 12, 'home_g_team_id' => 'C1', 'away_g_team_id' => 'C3', 'venue_id' => 9],
      //     ['id' => 30, 'date' => '2026-06-20 04:00:00', 'time' => '04:00:00','stage_id' =>'1', 'home_team_id' => 11, 'away_team_id' => 10, 'home_g_team_id' => 'C4', 'away_g_team_id' => 'C2', 'venue_id' => 12],
      //     ['id' => 31, 'date' => '2026-06-20 09:00:00', 'time' => '09:00:00','stage_id' =>'1', 'home_team_id' => 14, 'away_team_id' => 16, 'home_g_team_id' => 'D4', 'away_g_team_id' => 'D2', 'venue_id' => 11],
      //     ['id' => 32, 'date' => '2026-06-20 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 13, 'away_team_id' => 15, 'home_g_team_id' => 'D1', 'away_g_team_id' => 'D3', 'venue_id' => 10],
      //     ['id' => 33, 'date' => '2026-06-21 02:00:00', 'time' => '02:00:00','stage_id' =>'1', 'home_team_id' => 17, 'away_team_id' => 19, 'home_g_team_id' => 'E1', 'away_g_team_id' => 'E3', 'venue_id' => 2],
      //     ['id' => 34, 'date' => '2026-06-21 06:00:00', 'time' => '06:00:00','stage_id' =>'1', 'home_team_id' => 18, 'away_team_id' => 20, 'home_g_team_id' => 'E4', 'away_g_team_id' => 'E2', 'venue_id' => 4],
      //     ['id' => 35, 'date' => '2026-06-20 23:00:00', 'time' => '23:00:00','stage_id' =>'1', 'home_team_id' => 21, 'away_team_id' => 23, 'home_g_team_id' => 'F1', 'away_g_team_id' => 'F3', 'venue_id' => 6],
      //     ['id' => 36, 'date' => '2026-06-21 10:00:00', 'time' => '10:00:00','stage_id' =>'1', 'home_team_id' => 24, 'away_team_id' => 22, 'home_g_team_id' => 'F4', 'away_g_team_id' => 'F2', 'venue_id' => 16],
      //     ['id' => 37, 'date' => '2026-06-22 04:00:00', 'time' => '04:00:00','stage_id' =>'1', 'home_team_id' => 30, 'away_team_id' => 32, 'home_g_team_id' => 'H4', 'away_g_team_id' => 'H2', 'venue_id' => 13],
      //     ['id' => 38, 'date' => '2026-06-21 22:00:00', 'time' => '22:00:00','stage_id' =>'1', 'home_team_id' => 29, 'away_team_id' => 31, 'home_g_team_id' => 'H1', 'away_g_team_id' => 'H3', 'venue_id' => 7],
      //     ['id' => 39, 'date' => '2026-06-22 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 25, 'away_team_id' => 26, 'home_g_team_id' => 'G1', 'away_g_team_id' => 'G3', 'venue_id' => 8],
      //     ['id' => 40, 'date' => '2026-06-22 07:00:00', 'time' => '07:00:00','stage_id' =>'1', 'home_team_id' => 28, 'away_team_id' => 27, 'home_g_team_id' => 'G4', 'away_g_team_id' => 'G2', 'venue_id' => 1],
      //     ['id' => 41, 'date' => '2026-06-23 06:00:00', 'time' => '06:00:00','stage_id' =>'1', 'home_team_id' => 35, 'away_team_id' => 34, 'home_g_team_id' => 'I4', 'away_g_team_id' => 'I2', 'venue_id' => 3],
      //     ['id' => 42, 'date' => '2026-06-23 03:00:00', 'time' => '03:00:00','stage_id' =>'1', 'home_team_id' => 33, 'away_team_id' => 36, 'home_g_team_id' => 'I1', 'away_g_team_id' => 'I3', 'venue_id' => 9],
      //     ['id' => 43, 'date' => '2026-06-22 23:00:00', 'time' => '23:00:00','stage_id' =>'1', 'home_team_id' => 37, 'away_team_id' => 38, 'home_g_team_id' => 'J1', 'away_g_team_id' => 'J3', 'venue_id' => 5],
      //     ['id' => 44, 'date' => '2026-06-23 09:00:00', 'time' => '09:00:00','stage_id' =>'1', 'home_team_id' => 40, 'away_team_id' => 39, 'home_g_team_id' => 'J4', 'away_g_team_id' => 'J2', 'venue_id' => 11],
      //     ['id' => 45, 'date' => '2026-06-24 02:00:00', 'time' => '02:00:00','stage_id' =>'1', 'home_team_id' => 45, 'away_team_id' => 48, 'home_g_team_id' => 'L1', 'away_g_team_id' => 'L3', 'venue_id' => 12],
      //     ['id' => 46, 'date' => '2026-06-24 05:00:00', 'time' => '05:00:00','stage_id' =>'1', 'home_team_id' => 47, 'away_team_id' => 46, 'home_g_team_id' => 'L4', 'away_g_team_id' => 'L2', 'venue_id' => 2],
      //     ['id' => 47, 'date' => '2026-06-23 23:00:00', 'time' => '23:00:00','stage_id' =>'1', 'home_team_id' => 41, 'away_team_id' => 44, 'home_g_team_id' => 'K1', 'away_g_team_id' => 'K3', 'venue_id' => 6],
      //     ['id' => 48, 'date' => '2026-06-24 08:00:00', 'time' => '08:00:00','stage_id' =>'1', 'home_team_id' => 42, 'away_team_id' => 43, 'home_g_team_id' => 'K4', 'away_g_team_id' => 'K2', 'venue_id' => 15],
      //     ['id' => 49, 'date' => '2026-06-25 04:00:00', 'time' => '04:00:00','stage_id' =>'1', 'home_team_id' => 11, 'away_team_id' => 9, 'home_g_team_id' => 'C4', 'away_g_team_id' => 'C1', 'venue_id' => 13],
      //     ['id' => 50, 'date' => '2026-06-25 04:00:00', 'time' => '04:00:00','stage_id' =>'1', 'home_team_id' => 10, 'away_team_id' => 12, 'home_g_team_id' => 'C2', 'away_g_team_id' => 'C3', 'venue_id' => 7],
      //     ['id' => 51, 'date' => '2026-06-25 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 5, 'away_team_id' => 6, 'home_g_team_id' => 'B4', 'away_g_team_id' => 'B1', 'venue_id' => 1],
      //     ['id' => 52, 'date' => '2026-06-25 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 8, 'away_team_id' => 7, 'home_g_team_id' => 'B2', 'away_g_team_id' => 'B3', 'venue_id' => 10],
      //     ['id' => 53, 'date' => '2026-06-25 07:00:00', 'time' => '07:00:00','stage_id' =>'1', 'home_team_id' => 3, 'away_team_id' => 1, 'home_g_team_id' => 'A4', 'away_g_team_id' => 'A1', 'venue_id' => 14],
      //     ['id' => 54, 'date' => '2026-06-25 07:00:00', 'time' => '07:00:00','stage_id' =>'1', 'home_team_id' => 4, 'away_team_id' => 2, 'home_g_team_id' => 'A2', 'away_g_team_id' => 'A3', 'venue_id' => 16],
      //     ['id' => 55, 'date' => '2026-06-26 02:00:00', 'time' => '02:00:00','stage_id' =>'1', 'home_team_id' => 20, 'away_team_id' => 19, 'home_g_team_id' => 'E2', 'away_g_team_id' => 'E3', 'venue_id' => 9],
      //     ['id' => 56, 'date' => '2026-06-26 02:00:00', 'time' => '02:00:00','stage_id' =>'1', 'home_team_id' => 18, 'away_team_id' => 17, 'home_g_team_id' => 'E4', 'away_g_team_id' => 'E1', 'venue_id' => 3],
      //     ['id' => 57, 'date' => '2026-06-26 05:00:00', 'time' => '05:00:00','stage_id' =>'1', 'home_team_id' => 22, 'away_team_id' => 23, 'home_g_team_id' => 'F2', 'away_g_team_id' => 'F3', 'venue_id' => 5],
      //     ['id' => 58, 'date' => '2026-06-26 05:00:00', 'time' => '05:00:00','stage_id' =>'1', 'home_team_id' => 24, 'away_team_id' => 21, 'home_g_team_id' => 'F4', 'away_g_team_id' => 'F1', 'venue_id' => 4],
      //     ['id' => 59, 'date' => '2026-06-26 08:00:00', 'time' => '08:00:00','stage_id' =>'1', 'home_team_id' => 14, 'away_team_id' => 13, 'home_g_team_id' => 'D4', 'away_g_team_id' => 'D1', 'venue_id' => 8],
      //     ['id' => 60, 'date' => '2026-06-26 08:00:00', 'time' => '08:00:00','stage_id' =>'1', 'home_team_id' => 16, 'away_team_id' => 15, 'home_g_team_id' => 'D2', 'away_g_team_id' => 'D3', 'venue_id' => 11],
      //     ['id' => 61, 'date' => '2026-06-27 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 35, 'away_team_id' => 33, 'home_g_team_id' => 'I4', 'away_g_team_id' => 'I1', 'venue_id' => 12],
      //     ['id' => 62, 'date' => '2026-06-27 01:00:00', 'time' => '01:00:00','stage_id' =>'1', 'home_team_id' => 34, 'away_team_id' => 36, 'home_g_team_id' => 'I2', 'away_g_team_id' => 'I3', 'venue_id' => 2],
      //     ['id' => 63, 'date' => '2026-06-27 09:00:00', 'time' => '09:00:00','stage_id' =>'1', 'home_team_id' => 27, 'away_team_id' => 26, 'home_g_team_id' => 'G2', 'away_g_team_id' => 'G3', 'venue_id' => 10],
      //     ['id' => 64, 'date' => '2026-06-27 09:00:00', 'time' => '09:00:00','stage_id' =>'1', 'home_team_id' => 28, 'away_team_id' => 25, 'home_g_team_id' => 'G4', 'away_g_team_id' => 'G1', 'venue_id' => 1],
      //     ['id' => 65, 'date' => '2026-06-27 06:00:00', 'time' => '06:00:00','stage_id' =>'1', 'home_team_id' => 32, 'away_team_id' => 31, 'home_g_team_id' => 'H2', 'away_g_team_id' => 'H3', 'venue_id' => 6],
      //     ['id' => 66, 'date' => '2026-06-27 06:00:00', 'time' => '06:00:00','stage_id' =>'1', 'home_team_id' => 30, 'away_team_id' => 29, 'home_g_team_id' => 'H4', 'away_g_team_id' => 'H1', 'venue_id' => 15],
      //     ['id' => 67, 'date' => '2026-06-28 03:00:00', 'time' => '03:00:00','stage_id' =>'1', 'home_team_id' => 47, 'away_team_id' => 45, 'home_g_team_id' => 'L4', 'away_g_team_id' => 'L1', 'venue_id' => 3],
      //     ['id' => 68, 'date' => '2026-06-28 03:00:00', 'time' => '03:00:00','stage_id' =>'1', 'home_team_id' => 46, 'away_team_id' => 48, 'home_g_team_id' => 'L2', 'away_g_team_id' => 'L3', 'venue_id' => 9],
      //     ['id' => 69, 'date' => '2026-06-28 08:00:00', 'time' => '08:00:00','stage_id' =>'1', 'home_team_id' => 39, 'away_team_id' => 38, 'home_g_team_id' => 'J2', 'away_g_team_id' => 'J3', 'venue_id' => 4],
      //     ['id' => 70, 'date' => '2026-06-28 08:00:00', 'time' => '08:00:00','stage_id' =>'1', 'home_team_id' => 40, 'away_team_id' => 37, 'home_g_team_id' => 'J4', 'away_g_team_id' => 'J1', 'venue_id' => 5],
      //     ['id' => 71, 'date' => '2026-06-28 05:30:00', 'time' => '05:30:00','stage_id' =>'1', 'home_team_id' => 42, 'away_team_id' => 41, 'home_g_team_id' => 'K4', 'away_g_team_id' => 'K1', 'venue_id' => 13],
      //     ['id' => 72, 'date' => '2026-06-28 05:30:00', 'time' => '05:30:00','stage_id' =>'1', 'home_team_id' => 43, 'away_team_id' => 44, 'home_g_team_id' => 'K2', 'away_g_team_id' => 'K3', 'venue_id' => 7],
      //
      //     // Segunda fase - Partido 73 al 88
      //     ['id' => 73, 'date' => '2026-06-29 01:00:00', 'time' => '01:00:00','stage_id' => '2', 'home_g_team_id' => '2A', 'away_g_team_id' => '2B', 'venue_id' => 8],
      //     ['id' => 74, 'date' => '2026-06-30 02:30:00', 'time' => '02:30:00','stage_id' => '2', 'home_g_team_id' => '1E', 'away_g_team_id' => '3-ABCDF', 'venue_id' => 12],
      //     ['id' => 75, 'date' => '2026-06-30 07:00:00', 'time' => '07:00:00','stage_id' => '2', 'home_g_team_id' => '1F', 'away_g_team_id' => '2C', 'venue_id' => 16],
      //     ['id' => 76, 'date' => '2026-06-29 23:00:00', 'time' => '23:00:00','stage_id' => '2', 'home_g_team_id' => '1C', 'away_g_team_id' => '2F', 'venue_id' => 6],
      //     ['id' => 77, 'date' => '2026-07-01 03:00:00', 'time' => '03:00:00','stage_id' => '2', 'home_g_team_id' => '1I', 'away_g_team_id' => '3-CDFGH', 'venue_id' => 3],
      //     ['id' => 78, 'date' => '2026-06-30 23:00:00', 'time' => '23:00:00','stage_id' => '2', 'home_g_team_id' => '2E', 'away_g_team_id' => '2I', 'venue_id' => 5],
      //     ['id' => 79, 'date' => '2026-07-01 07:00:00', 'time' => '07:00:00','stage_id' => '2', 'home_g_team_id' => '1A', 'away_g_team_id' => '3-CEFHI', 'venue_id' => 14],
      //     ['id' => 80, 'date' => '2026-07-01 22:00:00', 'time' => '22:00:00','stage_id' => '2', 'home_g_team_id' => '1L', 'away_g_team_id' => '3-EHIJK', 'venue_id' => 7],
      //     ['id' => 81, 'date' => '2026-07-02 06:00:00', 'time' => '06:00:00','stage_id' => '2', 'home_g_team_id' => '1D', 'away_g_team_id' => '3-BEFIJ', 'venue_id' => 11],
      //     ['id' => 82, 'date' => '2026-07-02 02:00:00', 'time' => '02:00:00','stage_id' => '2', 'home_g_team_id' => '1G', 'away_g_team_id' => '3-AEHIJ', 'venue_id' => 10],
      //     ['id' => 83, 'date' => '2026-07-03 05:00:00', 'time' => '05:00:00','stage_id' => '2', 'home_g_team_id' => '2K', 'away_g_team_id' => '2L', 'venue_id' => 2],
      //     ['id' => 84, 'date' => '2026-07-03 01:00:00', 'time' => '01:00:00','stage_id' => '2', 'home_g_team_id' => '1H', 'away_g_team_id' => '2J', 'venue_id' => 8],
      //     ['id' => 85, 'date' => '2026-07-03 09:00:00', 'time' => '09:00:00','stage_id' => '2', 'home_g_team_id' => '1B', 'away_g_team_id' => '3-EFGIJ', 'venue_id' => 1],
      //     ['id' => 86, 'date' => '2026-07-04 04:00:00', 'time' => '04:00:00','stage_id' => '2', 'home_g_team_id' => '1J', 'away_g_team_id' => '2H', 'venue_id' => 13],
      //     ['id' => 87, 'date' => '2026-07-04 07:30:00', 'time' => '07:30:00','stage_id' => '2', 'home_g_team_id' => '1K', 'away_g_team_id' => '3-DEIJL', 'venue_id' => 4],
      //     ['id' => 88, 'date' => '2026-07-04 00:00:00', 'time' => '00:00:00','stage_id' => '2', 'home_g_team_id' => '2D', 'away_g_team_id' => '2G', 'venue_id' => 5],
      //
      //     // Octavos de final - Partido 89 al 96
      //     ['id' => 89, 'date' => '2026-07-05 03:00:00', 'time' => '03:00:00','stage_id' => '3', 'home_g_team_id' => 'W74', 'away_g_team_id' => 'W77', 'venue_id' => 9],
      //     ['id' => 90, 'date' => '2026-07-04 23:00:00', 'time' => '23:00:00','stage_id' => '3', 'home_g_team_id' => 'W73', 'away_g_team_id' => 'W75', 'venue_id' => 6],
      //     ['id' => 91, 'date' => '2026-07-06 02:00:00', 'time' => '02:00:00','stage_id' => '3', 'home_g_team_id' => 'W76', 'away_g_team_id' => 'W78', 'venue_id' => 3],
      //     ['id' => 92, 'date' => '2026-07-06 06:00:00', 'time' => '06:00:00','stage_id' => '3', 'home_g_team_id' => 'W79', 'away_g_team_id' => 'W80', 'venue_id' => 14],
      //     ['id' => 93, 'date' => '2026-07-07 01:00:00', 'time' => '01:00:00','stage_id' => '3', 'home_g_team_id' => 'W83', 'away_g_team_id' => 'W84', 'venue_id' => 5],
      //     ['id' => 94, 'date' => '2026-07-07 06:00:00', 'time' => '06:00:00','stage_id' => '3', 'home_g_team_id' => 'W81', 'away_g_team_id' => 'W82', 'venue_id' => 10],
      //     ['id' => 95, 'date' => '2026-07-07 22:00:00', 'time' => '22:00:00','stage_id' => '3', 'home_g_team_id' => 'W86', 'away_g_team_id' => 'W88', 'venue_id' => 7],
      //     ['id' => 96, 'date' => '2026-07-08 02:00:00', 'time' => '02:00:00','stage_id' => '3', 'home_g_team_id' => 'W85', 'away_g_team_id' => 'W87', 'venue_id' => 1],
      //
      //     // Cuartos de final - Partido 97 al 100
      //     ['id' => 97, 'date' => '2026-07-10 02:00:00', 'time' => '02:00:00','stage_id' => '4', 'home_g_team_id' => 'W89', 'away_g_team_id' => 'W90', 'venue_id' => 12],
      //     ['id' => 98, 'date' => '2026-07-11 01:00:00', 'time' => '01:00:00','stage_id' => '4', 'home_g_team_id' => 'W93', 'away_g_team_id' => 'W94', 'venue_id' => 8],
      //     ['id' => 99, 'date' => '2026-07-12 03:00:00', 'time' => '03:00:00','stage_id' => '4', 'home_g_team_id' => 'W91', 'away_g_team_id' => 'W92', 'venue_id' => 13],
      //     ['id' => 100, 'date' => '2026-07-12 07:00:00', 'time' => '07:00:00','stage_id' => '4', 'home_g_team_id' => 'W95', 'away_g_team_id' => 'W96', 'venue_id' => 4],
      //
      //     // Semifinales - Partido 101 al 104
      //     ['id' => 101, 'date' => '2026-07-15 01:00:00', 'time' => '01:00:00','stage_id' =>'5', 'home_g_team_id' => 'W97', 'away_g_team_id' => 'W98', 'venue_id' => 5],
      //     ['id' => 102, 'date' => '2026-07-16 01:00:00', 'time' => '01:00:00','stage_id' =>'5', 'home_g_team_id' => 'W99', 'away_g_team_id' => 'W100', 'venue_id' => 7],
      //
      //     // Tercer lugar - Partido 103
      //     ['id' => 103, 'date' => '2026-07-19 03:00:00', 'time' => '03:00:00', 'stage_id' =>'6', 'home_g_team_id' => 'RU101', 'away_g_team_id' => 'RU102', 'venue_id' => 13],
      //
      //     // Gran Final - Partido 104
      //     ['id' => 104, 'date' => '2026-07-20 01:00:00', 'time' => '01:00:00', 'stage_id' => '7', 'home_g_team_id' => 'W101', 'away_g_team_id' => 'W102', 'venue_id' => 3],
      // ];

      $games = [
          // ==================== GRUPO A ====================
          // México vs Sudáfrica (CDMX) - 15:00 oficial - 2h = 13:00
          ['id' => 1, 'date' => '2026-06-11 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 1, 'away_team_id' => 4, 'home_g_team_id' => 'A1', 'away_g_team_id' => 'A2', 'venue_id' => 14],
          // Corea del Sur vs República Checa (Guadalajara) - 22:00 oficial - 2h = 20:00
          ['id' => 2, 'date' => '2026-06-11 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 2, 'away_team_id' => 3, 'home_g_team_id' => 'A3', 'away_g_team_id' => 'A4', 'venue_id' => 15],
          // República Checa vs Sudáfrica (Atlanta) - 12:00 oficial - 2h = 10:00
          ['id' => 25, 'date' => '2026-06-18 10:00:00', 'time' => '10:00:00', 'stage_id' => '1', 'home_team_id' => 3, 'away_team_id' => 4, 'home_g_team_id' => 'A4', 'away_g_team_id' => 'A2', 'venue_id' => 7],
          // México vs Corea del Sur (Guadalajara) - 21:00 oficial - 2h = 19:00
          ['id' => 28, 'date' => '2026-06-18 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 1, 'away_team_id' => 2, 'home_g_team_id' => 'A1', 'away_g_team_id' => 'A3', 'venue_id' => 15],
          // República Checa vs México (CDMX) - 21:00 oficial - 2h = 19:00
          ['id' => 53, 'date' => '2026-06-24 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 3, 'away_team_id' => 1, 'home_g_team_id' => 'A4', 'away_g_team_id' => 'A1', 'venue_id' => 14],
          // Sudáfrica vs Corea del Sur (Monterrey) - 21:00 oficial - 2h = 19:00
          ['id' => 54, 'date' => '2026-06-24 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 4, 'away_team_id' => 2, 'home_g_team_id' => 'A2', 'away_g_team_id' => 'A3', 'venue_id' => 16],

          // ==================== GRUPO B ====================
          // Canadá vs Bosnia (Toronto) - 15:00 oficial - 2h = 13:00
          ['id' => 3, 'date' => '2026-06-12 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 6, 'away_team_id' => 8, 'home_g_team_id' => 'B1', 'away_g_team_id' => 'B2', 'venue_id' => 2],
          // Catar vs Suiza (San Francisco) - 15:00 oficial - 2h = 13:00
          ['id' => 5, 'date' => '2026-06-13 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 12, 'away_team_id' => 11, 'home_g_team_id' => 'C3', 'away_g_team_id' => 'C4', 'venue_id' => 12],
          // Suiza vs Bosnia (Los Ángeles) - 15:00 oficial - 2h = 13:00
          ['id' => 26, 'date' => '2026-06-18 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 5, 'away_team_id' => 8, 'home_g_team_id' => 'B4', 'away_g_team_id' => 'B2', 'venue_id' => 8],
          // Canadá vs Catar (Vancouver) - 18:00 oficial - 2h = 16:00
          ['id' => 27, 'date' => '2026-06-18 16:00:00', 'time' => '16:00:00', 'stage_id' => '1', 'home_team_id' => 6, 'away_team_id' => 7, 'home_g_team_id' => 'B1', 'away_g_team_id' => 'B3', 'venue_id' => 1],
          // Suiza vs Canadá (Vancouver) - 15:00 oficial - 2h = 13:00
          ['id' => 45, 'date' => '2026-06-24 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 45, 'away_team_id' => 48, 'home_g_team_id' => 'L1', 'away_g_team_id' => 'L3', 'venue_id' => 12],
          // Bosnia vs Catar (Seattle) - 15:00 oficial - 2h = 13:00
          ['id' => 46, 'date' => '2026-06-24 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 47, 'away_team_id' => 46, 'home_g_team_id' => 'L4', 'away_g_team_id' => 'L2', 'venue_id' => 2],

          // ==================== GRUPO C ====================
          // Brasil vs Marruecos (Nueva York) - 18:00 oficial - 2h = 16:00
          ['id' => 6, 'date' => '2026-06-13 16:00:00', 'time' => '16:00:00', 'stage_id' => '1', 'home_team_id' => 15, 'away_team_id' => 14, 'home_g_team_id' => 'D3', 'away_g_team_id' => 'D4', 'venue_id' => 1],
          // Haití vs Escocia (Boston) - 21:00 oficial - 2h = 19:00
          ['id' => 7, 'date' => '2026-06-13 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 9, 'away_team_id' => 10, 'home_g_team_id' => 'C1', 'away_g_team_id' => 'C2', 'venue_id' => 3],
          // Escocia vs Marruecos (Boston) - 18:00 oficial - 2h = 16:00
          ['id' => 29, 'date' => '2026-06-19 16:00:00', 'time' => '16:00:00', 'stage_id' => '1', 'home_team_id' => 9, 'away_team_id' => 12, 'home_g_team_id' => 'C1', 'away_g_team_id' => 'C3', 'venue_id' => 9],
          // Brasil vs Haití (Filadelfia) - 21:00 oficial - 2h = 19:00
          ['id' => 30, 'date' => '2026-06-19 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 11, 'away_team_id' => 10, 'home_g_team_id' => 'C4', 'away_g_team_id' => 'C2', 'venue_id' => 12],
          // Escocia vs Brasil (Miami) - 18:00 oficial - 2h = 16:00
          ['id' => 47, 'date' => '2026-06-24 16:00:00', 'time' => '16:00:00', 'stage_id' => '1', 'home_team_id' => 41, 'away_team_id' => 44, 'home_g_team_id' => 'K1', 'away_g_team_id' => 'K3', 'venue_id' => 6],
          // Marruecos vs Haití (Atlanta) - 18:00 oficial - 2h = 16:00
          ['id' => 48, 'date' => '2026-06-24 16:00:00', 'time' => '16:00:00', 'stage_id' => '1', 'home_team_id' => 42, 'away_team_id' => 43, 'home_g_team_id' => 'K4', 'away_g_team_id' => 'K2', 'venue_id' => 15],

          // ==================== GRUPO D ====================
          // Estados Unidos vs Paraguay (Los Ángeles) - 21:00 oficial - 2h = 19:00
          ['id' => 4, 'date' => '2026-06-12 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 13, 'away_team_id' => 16, 'home_g_team_id' => 'D1', 'away_g_team_id' => 'D2', 'venue_id' => 8],
          // Australia vs Turquía (Vancouver) - 00:00 oficial (13/06) - 2h = 22:00 (12/06)
          ['id' => 8, 'date' => '2026-06-12 22:00:00', 'time' => '22:00:00', 'stage_id' => '1', 'home_team_id' => 7, 'away_team_id' => 5, 'home_g_team_id' => 'B3', 'away_g_team_id' => 'B4', 'venue_id' => 11],
          // Estados Unidos vs Australia (Seattle) - 15:00 oficial - 2h = 13:00
          ['id' => 31, 'date' => '2026-06-19 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 14, 'away_team_id' => 16, 'home_g_team_id' => 'D4', 'away_g_team_id' => 'D2', 'venue_id' => 11],
          // Turquía vs Paraguay (San Francisco) - 00:00 oficial (20/06) - 2h = 22:00 (19/06)
          ['id' => 32, 'date' => '2026-06-19 22:00:00', 'time' => '22:00:00', 'stage_id' => '1', 'home_team_id' => 13, 'away_team_id' => 15, 'home_g_team_id' => 'D1', 'away_g_team_id' => 'D3', 'venue_id' => 10],
          // Turquía vs Estados Unidos (Los Ángeles) - 22:00 oficial - 2h = 20:00
          ['id' => 57, 'date' => '2026-06-25 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 22, 'away_team_id' => 23, 'home_g_team_id' => 'F2', 'away_g_team_id' => 'F3', 'venue_id' => 5],
          // Paraguay vs Australia (San Francisco) - 22:00 oficial - 2h = 20:00
          ['id' => 58, 'date' => '2026-06-25 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 24, 'away_team_id' => 21, 'home_g_team_id' => 'F4', 'away_g_team_id' => 'F1', 'venue_id' => 4],

          // ==================== GRUPO E ====================
          // Alemania vs Curazao (Houston) - 13:00 oficial - 2h = 11:00
          ['id' => 9, 'date' => '2026-06-14 11:00:00', 'time' => '11:00:00', 'stage_id' => '1', 'home_team_id' => 19, 'away_team_id' => 18, 'home_g_team_id' => 'E3', 'away_g_team_id' => 'E4', 'venue_id' => 9],
          // Costa de Marfil vs Ecuador (Filadelfia) - 19:00 oficial - 2h = 17:00
          ['id' => 11, 'date' => '2026-06-14 17:00:00', 'time' => '17:00:00', 'stage_id' => '1', 'home_team_id' => 21, 'away_team_id' => 22, 'home_g_team_id' => 'F1', 'away_g_team_id' => 'F2', 'venue_id' => 5],
          // Alemania vs Costa de Marfil (Toronto) - 16:00 oficial - 2h = 14:00
          ['id' => 33, 'date' => '2026-06-20 14:00:00', 'time' => '14:00:00', 'stage_id' => '1', 'home_team_id' => 17, 'away_team_id' => 19, 'home_g_team_id' => 'E1', 'away_g_team_id' => 'E3', 'venue_id' => 2],
          // Ecuador vs Curazao (Kansas City) - 22:00 oficial - 2h = 20:00
          ['id' => 34, 'date' => '2026-06-20 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 18, 'away_team_id' => 20, 'home_g_team_id' => 'E4', 'away_g_team_id' => 'E2', 'venue_id' => 4],
          // Curazao vs Costa de Marfil (Filadelfia) - 16:00 oficial - 2h = 14:00
          ['id' => 51, 'date' => '2026-06-24 14:00:00', 'time' => '14:00:00', 'stage_id' => '1', 'home_team_id' => 5, 'away_team_id' => 6, 'home_g_team_id' => 'B4', 'away_g_team_id' => 'B1', 'venue_id' => 1],
          // Ecuador vs Alemania (Nueva York) - 16:00 oficial - 2h = 14:00
          ['id' => 52, 'date' => '2026-06-24 14:00:00', 'time' => '14:00:00', 'stage_id' => '1', 'home_team_id' => 8, 'away_team_id' => 7, 'home_g_team_id' => 'B2', 'away_g_team_id' => 'B3', 'venue_id' => 10],

          // ==================== GRUPO F ====================
          // Países Bajos vs Japón (Dallas) - 16:00 oficial - 2h = 14:00
          ['id' => 10, 'date' => '2026-06-14 14:00:00', 'time' => '14:00:00', 'stage_id' => '1', 'home_team_id' => 17, 'away_team_id' => 20, 'home_g_team_id' => 'E1', 'away_g_team_id' => 'E2', 'venue_id' => 6],
          // Suecia vs Túnez (Monterrey) - 22:00 oficial - 2h = 20:00
          ['id' => 12, 'date' => '2026-06-14 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 23, 'away_team_id' => 24, 'home_g_team_id' => 'F3', 'away_g_team_id' => 'F4', 'venue_id' => 16],
          // Países Bajos vs Suecia (Houston) - 13:00 oficial - 2h = 11:00
          ['id' => 35, 'date' => '2026-06-20 11:00:00', 'time' => '11:00:00', 'stage_id' => '1', 'home_team_id' => 21, 'away_team_id' => 23, 'home_g_team_id' => 'F1', 'away_g_team_id' => 'F3', 'venue_id' => 6],
          // Túnez vs Japón (Monterrey) - 00:00 oficial (21/06) - 2h = 22:00 (20/06)
          ['id' => 36, 'date' => '2026-06-20 22:00:00', 'time' => '22:00:00', 'stage_id' => '1', 'home_team_id' => 24, 'away_team_id' => 22, 'home_g_team_id' => 'F4', 'away_g_team_id' => 'F2', 'venue_id' => 16],
          // Japón vs Suecia (Dallas) - 19:00 oficial - 2h = 17:00
          ['id' => 55, 'date' => '2026-06-25 17:00:00', 'time' => '17:00:00', 'stage_id' => '1', 'home_team_id' => 20, 'away_team_id' => 19, 'home_g_team_id' => 'E2', 'away_g_team_id' => 'E3', 'venue_id' => 9],
          // Túnez vs Países Bajos (Kansas City) - 19:00 oficial - 2h = 17:00
          ['id' => 56, 'date' => '2026-06-25 17:00:00', 'time' => '17:00:00', 'stage_id' => '1', 'home_team_id' => 18, 'away_team_id' => 17, 'home_g_team_id' => 'E4', 'away_g_team_id' => 'E1', 'venue_id' => 3],

          // ==================== GRUPO G ====================
          // Bélgica vs Egipto (Seattle) - 15:00 oficial - 2h = 13:00
          ['id' => 14, 'date' => '2026-06-15 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 29, 'away_team_id' => 32, 'home_g_team_id' => 'H1', 'away_g_team_id' => 'H2', 'venue_id' => 7],
          // RI de Irán vs Nueva Zelanda (Los Ángeles) - 21:00 oficial - 2h = 19:00
          ['id' => 16, 'date' => '2026-06-15 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 25, 'away_team_id' => 27, 'home_g_team_id' => 'G1', 'away_g_team_id' => 'G2', 'venue_id' => 10],
          // Bélgica vs Irán (Los Ángeles) - 15:00 oficial - 2h = 13:00
          ['id' => 37, 'date' => '2026-06-21 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 30, 'away_team_id' => 32, 'home_g_team_id' => 'H4', 'away_g_team_id' => 'H2', 'venue_id' => 13],
          // Nueva Zelanda vs Egipto (Vancouver) - 21:00 oficial - 2h = 19:00
          ['id' => 38, 'date' => '2026-06-21 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 29, 'away_team_id' => 31, 'home_g_team_id' => 'H1', 'away_g_team_id' => 'H3', 'venue_id' => 7],
          // Egipto vs Irán (Seattle) - 23:00 oficial - 2h = 21:00
          ['id' => 63, 'date' => '2026-06-26 21:00:00', 'time' => '21:00:00', 'stage_id' => '1', 'home_team_id' => 27, 'away_team_id' => 26, 'home_g_team_id' => 'G2', 'away_g_team_id' => 'G3', 'venue_id' => 10],
          // Nueva Zelanda vs Bélgica (Vancouver) - 23:00 oficial - 2h = 21:00
          ['id' => 64, 'date' => '2026-06-26 21:00:00', 'time' => '21:00:00', 'stage_id' => '1', 'home_team_id' => 28, 'away_team_id' => 25, 'home_g_team_id' => 'G4', 'away_g_team_id' => 'G1', 'venue_id' => 1],

          // ==================== GRUPO H ====================
          // España vs Cabo Verde (Atlanta) - 12:00 oficial - 2h = 10:00
          ['id' => 13, 'date' => '2026-06-15 10:00:00', 'time' => '10:00:00', 'stage_id' => '1', 'home_team_id' => 31, 'away_team_id' => 30, 'home_g_team_id' => 'H3', 'away_g_team_id' => 'H4', 'venue_id' => 13],
          // Arabia Saudí vs Uruguay (Miami) - 18:00 oficial - 2h = 16:00
          ['id' => 15, 'date' => '2026-06-15 16:00:00', 'time' => '16:00:00', 'stage_id' => '1', 'home_team_id' => 26, 'away_team_id' => 28, 'home_g_team_id' => 'G3', 'away_g_team_id' => 'G4', 'venue_id' => 8],
          // España vs Arabia Saudí (Atlanta) - 12:00 oficial - 2h = 10:00
          ['id' => 39, 'date' => '2026-06-21 10:00:00', 'time' => '10:00:00', 'stage_id' => '1', 'home_team_id' => 25, 'away_team_id' => 26, 'home_g_team_id' => 'G1', 'away_g_team_id' => 'G3', 'venue_id' => 8],
          // Uruguay vs Cabo Verde (Miami) - 18:00 oficial - 2h = 16:00
          ['id' => 40, 'date' => '2026-06-21 16:00:00', 'time' => '16:00:00', 'stage_id' => '1', 'home_team_id' => 28, 'away_team_id' => 27, 'home_g_team_id' => 'G4', 'away_g_team_id' => 'G2', 'venue_id' => 1],
          // Cabo Verde vs Arabia Saudí (Houston) - 20:00 oficial - 2h = 18:00
          ['id' => 61, 'date' => '2026-06-26 18:00:00', 'time' => '18:00:00', 'stage_id' => '1', 'home_team_id' => 35, 'away_team_id' => 33, 'home_g_team_id' => 'I4', 'away_g_team_id' => 'I1', 'venue_id' => 12],
          // Uruguay vs España (Guadalajara) - 20:00 oficial - 2h = 18:00
          ['id' => 62, 'date' => '2026-06-26 18:00:00', 'time' => '18:00:00', 'stage_id' => '1', 'home_team_id' => 34, 'away_team_id' => 36, 'home_g_team_id' => 'I2', 'away_g_team_id' => 'I3', 'venue_id' => 2],

          // ==================== GRUPO I ====================
          // Francia vs Senegal (Nueva York) - 15:00 oficial - 2h = 13:00
          ['id' => 17, 'date' => '2026-06-16 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 33, 'away_team_id' => 34, 'home_g_team_id' => 'I1', 'away_g_team_id' => 'I2', 'venue_id' => 3],
          // Irak vs Noruega (Boston) - 18:00 oficial - 2h = 16:00
          ['id' => 18, 'date' => '2026-06-16 16:00:00', 'time' => '16:00:00', 'stage_id' => '1', 'home_team_id' => 36, 'away_team_id' => 35, 'home_g_team_id' => 'I3', 'away_g_team_id' => 'I4', 'venue_id' => 12],
          // Francia vs Irak (Filadelfia) - 17:00 oficial - 2h = 15:00
          ['id' => 41, 'date' => '2026-06-22 15:00:00', 'time' => '15:00:00', 'stage_id' => '1', 'home_team_id' => 35, 'away_team_id' => 34, 'home_g_team_id' => 'I4', 'away_g_team_id' => 'I2', 'venue_id' => 3],
          // Noruega vs Senegal (Nueva York) - 20:00 oficial - 2h = 18:00
          ['id' => 42, 'date' => '2026-06-22 18:00:00', 'time' => '18:00:00', 'stage_id' => '1', 'home_team_id' => 33, 'away_team_id' => 36, 'home_g_team_id' => 'I1', 'away_g_team_id' => 'I3', 'venue_id' => 9],
          // Noruega vs Francia (Boston) - 15:00 oficial - 2h = 13:00
          ['id' => 59, 'date' => '2026-06-26 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 14, 'away_team_id' => 13, 'home_g_team_id' => 'D4', 'away_g_team_id' => 'D1', 'venue_id' => 8],
          // Senegal vs Irak (Toronto) - 15:00 oficial - 2h = 13:00
          ['id' => 60, 'date' => '2026-06-26 13:00:00', 'time' => '13:00:00', 'stage_id' => '1', 'home_team_id' => 16, 'away_team_id' => 15, 'home_g_team_id' => 'D2', 'away_g_team_id' => 'D3', 'venue_id' => 11],

          // ==================== GRUPO J ====================
          // Argentina vs Argelia (Kansas City) - 21:00 oficial - 2h = 19:00
          ['id' => 19, 'date' => '2026-06-16 19:00:00', 'time' => '19:00:00', 'stage_id' => '1', 'home_team_id' => 37, 'away_team_id' => 39, 'home_g_team_id' => 'J1', 'away_g_team_id' => 'J2', 'venue_id' => 4],
          // Austria vs Jordania (San Francisco) - 00:00 oficial (17/06) - 2h = 22:00 (16/06)
          ['id' => 20, 'date' => '2026-06-16 22:00:00', 'time' => '22:00:00', 'stage_id' => '1', 'home_team_id' => 38, 'away_team_id' => 40, 'home_g_team_id' => 'J3', 'away_g_team_id' => 'J4', 'venue_id' => 11],
          // Argentina vs Austria (Dallas) - 13:00 oficial - 2h = 11:00
          ['id' => 43, 'date' => '2026-06-22 11:00:00', 'time' => '11:00:00', 'stage_id' => '1', 'home_team_id' => 37, 'away_team_id' => 38, 'home_g_team_id' => 'J1', 'away_g_team_id' => 'J3', 'venue_id' => 5],
          // Jordania vs Argelia (San Francisco) - 23:00 oficial - 2h = 21:00
          ['id' => 44, 'date' => '2026-06-22 21:00:00', 'time' => '21:00:00', 'stage_id' => '1', 'home_team_id' => 40, 'away_team_id' => 39, 'home_g_team_id' => 'J4', 'away_g_team_id' => 'J2', 'venue_id' => 11],
          // Argelia vs Austria (Kansas City) - 22:00 oficial - 2h = 20:00
          ['id' => 69, 'date' => '2026-06-27 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 39, 'away_team_id' => 38, 'home_g_team_id' => 'J2', 'away_g_team_id' => 'J3', 'venue_id' => 4],
          // Jordania vs Argentina (Dallas) - 22:00 oficial - 2h = 20:00
          ['id' => 70, 'date' => '2026-06-27 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 40, 'away_team_id' => 37, 'home_g_team_id' => 'J4', 'away_g_team_id' => 'J1', 'venue_id' => 5],

          // ==================== GRUPO K ====================
          // Portugal vs RD Congo (Houston) - 13:00 oficial - 2h = 11:00
          ['id' => 21, 'date' => '2026-06-17 11:00:00', 'time' => '11:00:00', 'stage_id' => '1', 'home_team_id' => 48, 'away_team_id' => 47, 'home_g_team_id' => 'L3', 'away_g_team_id' => 'L4', 'venue_id' => 2],
          // Uzbekistán vs Colombia (CDMX) - 22:00 oficial - 2h = 20:00
          ['id' => 24, 'date' => '2026-06-17 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 44, 'away_team_id' => 42, 'home_g_team_id' => 'K3', 'away_g_team_id' => 'K4', 'venue_id' => 14],
          // Portugal vs Uzbekistán (Houston) - 13:00 oficial - 2h = 11:00
          ['id' => 49, 'date' => '2026-06-23 11:00:00', 'time' => '11:00:00', 'stage_id' => '1', 'home_team_id' => 11, 'away_team_id' => 9, 'home_g_team_id' => 'C4', 'away_g_team_id' => 'C1', 'venue_id' => 13],
          // Colombia vs RD Congo (Guadalajara) - 22:00 oficial - 2h = 20:00
          ['id' => 50, 'date' => '2026-06-23 20:00:00', 'time' => '20:00:00', 'stage_id' => '1', 'home_team_id' => 10, 'away_team_id' => 12, 'home_g_team_id' => 'C2', 'away_g_team_id' => 'C3', 'venue_id' => 7],
          // Colombia vs Portugal (Miami) - 19:30 oficial - 2h = 17:30
          ['id' => 67, 'date' => '2026-06-27 17:30:00', 'time' => '17:30:00', 'stage_id' => '1', 'home_team_id' => 47, 'away_team_id' => 45, 'home_g_team_id' => 'L4', 'away_g_team_id' => 'L1', 'venue_id' => 3],
          // RD Congo vs Uzbekistán (Atlanta) - 19:30 oficial - 2h = 17:30
          ['id' => 68, 'date' => '2026-06-27 17:30:00', 'time' => '17:30:00', 'stage_id' => '1', 'home_team_id' => 46, 'away_team_id' => 48, 'home_g_team_id' => 'L2', 'away_g_team_id' => 'L3', 'venue_id' => 9],

          // ==================== GRUPO L ====================
          // Inglaterra vs Croacia (Dallas) - 16:00 oficial - 2h = 14:00
          ['id' => 22, 'date' => '2026-06-17 14:00:00', 'time' => '14:00:00', 'stage_id' => '1', 'home_team_id' => 45, 'away_team_id' => 46, 'home_g_team_id' => 'L1', 'away_g_team_id' => 'L2', 'venue_id' => 5],
          // Ghana vs Panamá (Toronto) - 19:00 oficial - 2h = 17:00
          ['id' => 23, 'date' => '2026-06-17 17:00:00', 'time' => '17:00:00', 'stage_id' => '1', 'home_team_id' => 41, 'away_team_id' => 43, 'home_g_team_id' => 'K1', 'away_g_team_id' => 'K2', 'venue_id' => 6],
          // Inglaterra vs Ghana (Boston) - 16:00 oficial - 2h = 14:00
          ['id' => 65, 'date' => '2026-06-27 14:00:00', 'time' => '14:00:00', 'stage_id' => '1', 'home_team_id' => 32, 'away_team_id' => 31, 'home_g_team_id' => 'H2', 'away_g_team_id' => 'H3', 'venue_id' => 6],
          // Panamá vs Croacia (Toronto) - 19:00 oficial - 2h = 17:00
          ['id' => 66, 'date' => '2026-06-27 17:00:00', 'time' => '17:00:00', 'stage_id' => '1', 'home_team_id' => 30, 'away_team_id' => 29, 'home_g_team_id' => 'H4', 'away_g_team_id' => 'H1', 'venue_id' => 15],
          // Panamá vs Inglaterra (Nueva York) - 17:00 oficial - 2h = 15:00
          ['id' => 71, 'date' => '2026-06-28 15:00:00', 'time' => '15:00:00', 'stage_id' => '1', 'home_team_id' => 42, 'away_team_id' => 41, 'home_g_team_id' => 'K4', 'away_g_team_id' => 'K1', 'venue_id' => 13],
          // Croacia vs Ghana (Filadelfia) - 17:00 oficial - 2h = 15:00
          ['id' => 72, 'date' => '2026-06-28 15:00:00', 'time' => '15:00:00', 'stage_id' => '1', 'home_team_id' => 43, 'away_team_id' => 44, 'home_g_team_id' => 'K2', 'away_g_team_id' => 'K3', 'venue_id' => 7],

          // ==================== SEGUNDA FASE (16AVOS DE FINAL) ====================
          // Partido 73 - 2º Grupo A vs 2º Grupo B (Los Ángeles)
          ['id' => 73, 'date' => '2026-06-28 15:00:00', 'time' => '15:00:00', 'stage_id' => '2', 'home_g_team_id' => '2A', 'away_g_team_id' => '2B', 'venue_id' => 8],
          // Partido 74 - 1º Grupo E vs 3º Grupo A/B/C/D/F (Boston)
          ['id' => 74, 'date' => '2026-06-29 12:00:00', 'time' => '12:00:00', 'stage_id' => '2', 'home_g_team_id' => '1E', 'away_g_team_id' => '3-ABCDF', 'venue_id' => 12],
          // Partido 75 - 1º Grupo F vs 2º Grupo C (Monterrey)
          ['id' => 75, 'date' => '2026-06-29 19:00:00', 'time' => '19:00:00', 'stage_id' => '2', 'home_g_team_id' => '1F', 'away_g_team_id' => '2C', 'venue_id' => 16],
          // Partido 76 - 1º Grupo C vs 2º Grupo F (Houston)
          ['id' => 76, 'date' => '2026-06-30 15:00:00', 'time' => '15:00:00', 'stage_id' => '2', 'home_g_team_id' => '1C', 'away_g_team_id' => '2F', 'venue_id' => 6],
          // Partido 77 - 1º Grupo I vs 3º Grupo C/D/F/G/H (Nueva York)
          ['id' => 77, 'date' => '2026-06-30 12:00:00', 'time' => '12:00:00', 'stage_id' => '2', 'home_g_team_id' => '1I', 'away_g_team_id' => '3-CDFGH', 'venue_id' => 3],
          // Partido 78 - 2º Grupo E vs 2º Grupo I (Dallas)
          ['id' => 78, 'date' => '2026-06-30 19:00:00', 'time' => '19:00:00', 'stage_id' => '2', 'home_g_team_id' => '2E', 'away_g_team_id' => '2I', 'venue_id' => 5],
          // Partido 79 - 1º Grupo A vs 3º Grupo C/E/F/H/I (CDMX)
          ['id' => 79, 'date' => '2026-06-30 19:00:00', 'time' => '19:00:00', 'stage_id' => '2', 'home_g_team_id' => '1A', 'away_g_team_id' => '3-CEFHI', 'venue_id' => 14],
          // Partido 80 - 1º Grupo L vs 3º Grupo E/H/I/J/K (Atlanta)
          ['id' => 80, 'date' => '2026-07-01 15:00:00', 'time' => '15:00:00', 'stage_id' => '2', 'home_g_team_id' => '1L', 'away_g_team_id' => '3-EHIJK', 'venue_id' => 7],
          // Partido 81 - 1º Grupo D vs 3º Grupo B/E/F/I/J (San Francisco)
          ['id' => 81, 'date' => '2026-07-01 15:00:00', 'time' => '15:00:00', 'stage_id' => '2', 'home_g_team_id' => '1D', 'away_g_team_id' => '3-BEFIJ', 'venue_id' => 11],
          // Partido 82 - 1º Grupo G vs 3º Grupo A/E/H/I/J (Seattle)
          ['id' => 82, 'date' => '2026-07-01 19:00:00', 'time' => '19:00:00', 'stage_id' => '2', 'home_g_team_id' => '1G', 'away_g_team_id' => '3-AEHIJ', 'venue_id' => 10],
          // Partido 83 - 2º Grupo K vs 2º Grupo L (Toronto)
          ['id' => 83, 'date' => '2026-07-02 15:00:00', 'time' => '15:00:00', 'stage_id' => '2', 'home_g_team_id' => '2K', 'away_g_team_id' => '2L', 'venue_id' => 2],
          // Partido 84 - 1º Grupo H vs 2º Grupo J (Los Ángeles)
          ['id' => 84, 'date' => '2026-07-02 19:00:00', 'time' => '19:00:00', 'stage_id' => '2', 'home_g_team_id' => '1H', 'away_g_team_id' => '2J', 'venue_id' => 8],
          // Partido 85 - 1º Grupo B vs 3º Grupo E/F/G/I/J (Vancouver)
          ['id' => 85, 'date' => '2026-07-02 19:00:00', 'time' => '19:00:00', 'stage_id' => '2', 'home_g_team_id' => '1B', 'away_g_team_id' => '3-EFGIJ', 'venue_id' => 1],
          // Partido 86 - 1º Grupo J vs 2º Grupo H (Miami)
          ['id' => 86, 'date' => '2026-07-03 15:00:00', 'time' => '15:00:00', 'stage_id' => '2', 'home_g_team_id' => '1J', 'away_g_team_id' => '2H', 'venue_id' => 13],
          // Partido 87 - 1º Grupo K vs 3º Grupo D/E/I/J/L (Kansas City)
          ['id' => 87, 'date' => '2026-07-03 19:00:00', 'time' => '19:00:00', 'stage_id' => '2', 'home_g_team_id' => '1K', 'away_g_team_id' => '3-DEIJL', 'venue_id' => 4],
          // Partido 88 - 2º Grupo D vs 2º Grupo G (Dallas)
          ['id' => 88, 'date' => '2026-07-03 15:00:00', 'time' => '15:00:00', 'stage_id' => '2', 'home_g_team_id' => '2D', 'away_g_team_id' => '2G', 'venue_id' => 5],

          // ==================== OCTAVOS DE FINAL ====================
          // Partido 89 - W74 vs W77 (Filadelfia)
          ['id' => 89, 'date' => '2026-07-04 12:00:00', 'time' => '12:00:00', 'stage_id' => '3', 'home_g_team_id' => 'W74', 'away_g_team_id' => 'W77', 'venue_id' => 9],
          // Partido 90 - W73 vs W75 (Houston)
          ['id' => 90, 'date' => '2026-07-04 16:00:00', 'time' => '16:00:00', 'stage_id' => '3', 'home_g_team_id' => 'W73', 'away_g_team_id' => 'W75', 'venue_id' => 6],
          // Partido 91 - W76 vs W78 (Nueva York)
          ['id' => 91, 'date' => '2026-07-05 12:00:00', 'time' => '12:00:00', 'stage_id' => '3', 'home_g_team_id' => 'W76', 'away_g_team_id' => 'W78', 'venue_id' => 3],
          // Partido 92 - W79 vs W80 (CDMX)
          ['id' => 92, 'date' => '2026-07-05 16:00:00', 'time' => '16:00:00', 'stage_id' => '3', 'home_g_team_id' => 'W79', 'away_g_team_id' => 'W80', 'venue_id' => 14],
          // Partido 93 - W83 vs W84 (Dallas)
          ['id' => 93, 'date' => '2026-07-06 12:00:00', 'time' => '12:00:00', 'stage_id' => '3', 'home_g_team_id' => 'W83', 'away_g_team_id' => 'W84', 'venue_id' => 5],
          // Partido 94 - W81 vs W82 (Seattle)
          ['id' => 94, 'date' => '2026-07-06 16:00:00', 'time' => '16:00:00', 'stage_id' => '3', 'home_g_team_id' => 'W81', 'away_g_team_id' => 'W82', 'venue_id' => 10],
          // Partido 95 - W86 vs W88 (Atlanta)
          ['id' => 95, 'date' => '2026-07-07 15:00:00', 'time' => '15:00:00', 'stage_id' => '3', 'home_g_team_id' => 'W86', 'away_g_team_id' => 'W88', 'venue_id' => 7],
          // Partido 96 - W85 vs W87 (Vancouver)
          ['id' => 96, 'date' => '2026-07-07 19:00:00', 'time' => '19:00:00', 'stage_id' => '3', 'home_g_team_id' => 'W85', 'away_g_team_id' => 'W87', 'venue_id' => 1],

          // ==================== CUARTOS DE FINAL ====================
          // Partido 97 - W89 vs W90 (Boston)
          ['id' => 97, 'date' => '2026-07-09 15:00:00', 'time' => '15:00:00', 'stage_id' => '4', 'home_g_team_id' => 'W89', 'away_g_team_id' => 'W90', 'venue_id' => 12],
          // Partido 98 - W93 vs W94 (Los Ángeles)
          ['id' => 98, 'date' => '2026-07-10 15:00:00', 'time' => '15:00:00', 'stage_id' => '4', 'home_g_team_id' => 'W93', 'away_g_team_id' => 'W94', 'venue_id' => 8],
          // Partido 99 - W91 vs W92 (Miami)
          ['id' => 99, 'date' => '2026-07-11 15:00:00', 'time' => '15:00:00', 'stage_id' => '4', 'home_g_team_id' => 'W91', 'away_g_team_id' => 'W92', 'venue_id' => 13],
          // Partido 100 - W95 vs W96 (Kansas City)
          ['id' => 100, 'date' => '2026-07-11 19:00:00', 'time' => '19:00:00', 'stage_id' => '4', 'home_g_team_id' => 'W95', 'away_g_team_id' => 'W96', 'venue_id' => 4],

          // ==================== SEMIFINALES ====================
          // Partido 101 - W97 vs W98 (Dallas)
          ['id' => 101, 'date' => '2026-07-14 15:00:00', 'time' => '15:00:00', 'stage_id' => '5', 'home_g_team_id' => 'W97', 'away_g_team_id' => 'W98', 'venue_id' => 5],
          // Partido 102 - W99 vs W100 (Atlanta)
          ['id' => 102, 'date' => '2026-07-15 15:00:00', 'time' => '15:00:00', 'stage_id' => '5', 'home_g_team_id' => 'W99', 'away_g_team_id' => 'W100', 'venue_id' => 7],

          // ==================== TERCER LUGAR ====================
          // Partido 103 - Perdedor 101 vs Perdedor 102 (Miami)
          ['id' => 103, 'date' => '2026-07-18 15:00:00', 'time' => '15:00:00', 'stage_id' => '6', 'home_g_team_id' => 'RU101', 'away_g_team_id' => 'RU102', 'venue_id' => 13],

          // ==================== GRAN FINAL ====================
          // Partido 104 - W101 vs W102 (Nueva York)
          ['id' => 104, 'date' => '2026-07-19 18:00:00', 'time' => '18:00:00', 'stage_id' => '7', 'home_g_team_id' => 'W101', 'away_g_team_id' => 'W102', 'venue_id' => 3],
      ];

      foreach ($games as $game) {
          Game::Create( $game );
        }

        // UPDATE games
        // SET date = DATE_SUB(date, INTERVAL 1 DAY);
    }
}
