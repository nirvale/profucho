<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Administrador de Sistema',
            'email' => 'god@profucho.mx',

            'password' => Hash::make('admin2134'),
            // 'id' => 1,
        ])->syncRoles(['Administrador de Sistema']);

        $user = User::create([
            'name' => 'Alex Martínez',
            'email' => 'nirvale_mtz@hotmail.com',
            'password' => Hash::make('imagine'),
            // 'id' => 3,
        ])->syncRoles(['Jugador']);

        $user = User::create([
            'name' => 'suspendido',
            'email' => 'suspendido@profucho.mx',
            'password' => Hash::make('admin'),
            // 'id' => 4,
        ])->syncRoles(['Suspendido']);

        $user = User::create([
            'name' => 'eliminado',
            'email' => 'eliminado@profucho.mx',
            'password' => Hash::make('admin'),
            // 'id' => 5,
        ])->syncRoles(['Eliminado']);
    }
}
