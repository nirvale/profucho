<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intranet\Stage;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $stage = Stage::create([
          'id' => '1',
          'name' => 'Fase de grupos',
      ]);
      $stage = Stage::create([
          'id' => '2',
          'name' => 'Segunda fase',
      ]);
      $stage = Stage::create([
          'id' => '3',
          'name' => 'Octavos de final',
      ]);
      $stage = Stage::create([
          'id' => '4',
          'name' => 'Cuartos de final',
      ]);
      $stage = Stage::create([
          'id' => '5',
          'name' => 'Semifinales',
      ]);
      $stage = Stage::create([
          'id' => '6',
          'name' => 'Partido de tercer lugar',
      ]);
      $stage = Stage::create([
          'id' => '7',
          'name' => 'Final',
      ]);
    }
}
