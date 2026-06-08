<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intranet\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $profile = Profile::create([
          'phone' => '7226342712',
          'address' => 'Carranza 728',
          'user_id' => 1,

      ]);
      $profile = Profile::create([
          'phone' => '7226342712',
          'address' => 'Carranza 728',
          'user_id' => 2,
      ]);
      $profile = Profile::create([
          'phone' => '7226342712',
          'address' => 'Carranza 728',
          'user_id' => 3,
          'is_active' => 0
      ]);
      $profile = Profile::create([
          'phone' => '7226342712',
          'address' => 'Carranza 728',
          'user_id' => 4,
          'is_active' => 0
      ]);
    }
}
