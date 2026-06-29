<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intranet\Amount;

class AmountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $amount = Amount::create([
          'id' => '1',
          'name' => 'Entrada general',
          'stage_id'=>1,
          'is_active'=>1,
          'amount' => '50.00',
      ]);
      $amount = Amount::create([
          'id' => '2',
          'name' => 'Entrada general',
          'stage_id'=>2,
          'is_active'=>1,
          'amount' => '50.00',
      ]);
      $amount = Amount::create([
          'id' => '3',
          'name' => 'Entrada general',
          'stage_id'=>3,
          'is_active'=>1,
          'amount' => '50.00',
      ]);
      $amount = Amount::create([
          'id' => '4',
          'name' => 'Entrada general',
          'stage_id'=>4,
          'is_active'=>1,
          'amount' => '50.00',
      ]);
      $amount = Amount::create([
          'id' => '5',
          'name' => 'Entrada general',
          'stage_id'=>5,
          'is_active'=>1,
          'amount' => '50.00',
      ]);
      $amount = Amount::create([
          'id' => '6',
          'name' => 'Entrada general',
          'stage_id'=>6,
          'is_active'=>1,
          'amount' => '50.00',
      ]);
      $amount = Amount::create([
          'id' => '7',
          'name' => 'Entrada general',
          'stage_id'=>7,
          'is_active'=>1,
          'amount' => '50.00',
      ]);
    }
}
