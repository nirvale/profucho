<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intranet\Venue;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $venue = Venue::create(['name' => 'Vancouver']);
      $venue = Venue::create(['name' => 'Toronto']);
      $venue = Venue::create(['name' => 'New York/New Jersey']);
      $venue = Venue::create(['name' => 'Kansas City']);
      $venue = Venue::create(['name' => 'Dallas']);
      $venue = Venue::create(['name' => 'Houston']);
      $venue = Venue::create(['name' => 'Atlanta']);
      $venue = Venue::create(['name' => 'Los Angeles']);
      $venue = Venue::create(['name' => 'Philadelphia']);
      $venue = Venue::create(['name' => 'Seattle']);
      $venue = Venue::create(['name' => 'San Francisco Bay Area']);
      $venue = Venue::create(['name' => 'Boston']);
      $venue = Venue::create(['name' => 'Miami']);
      $venue = Venue::create(['name' => 'Mexico City']);
      $venue = Venue::create(['name' => 'Guadalajara']);
      $venue = Venue::create(['name' => 'Monterrey']);
    }
}
