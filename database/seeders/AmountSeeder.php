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
    }
}
