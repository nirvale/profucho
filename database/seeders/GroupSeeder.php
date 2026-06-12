<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intranet\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $groups = [
          // ==================== GRUPO A ====================
          [
              'name' => 'A',
              'team_id' => 1,   // México
              'position' => 1,
          ],
          [
              'name' => 'A',
              'team_id' => 4,   // Sudáfrica
              'position' => 2,
          ],
          [
              'name' => 'A',
              'team_id' => 2,   // Corea del Sur
              'position' => 3,
          ],
          [
              'name' => 'A',
              'team_id' => 3,   // República Checa
              'position' => 4,
          ],
          // ==================== GRUPO B ====================
          [
              'name' => 'B',
              'team_id' => 6,   // Canadá
              'position' => 1,
          ],
          [
              'name' => 'B',
              'team_id' => 8,   // Bosnia y Herzegovina
              'position' => 2,
          ],
          [
              'name' => 'B',
              'team_id' => 7,   // Catar
              'position' => 3,
          ],
          [
              'name' => 'B',
              'team_id' => 5,   // Suiza
              'position' => 4,
          ],
          // ==================== GRUPO C ====================
          [
              'name' => 'C',
              'team_id' => 9,   // Brasil
              'position' => 1,
          ],
          [
              'name' => 'C',
              'team_id' => 10,  // Marruecos
              'position' => 2,
          ],
          [
              'name' => 'C',
              'team_id' => 12,  // Haití
              'position' => 3,
          ],
          [
              'name' => 'C',
              'team_id' => 11,  // Escocia
              'position' => 4,
          ],
          // ==================== GRUPO D ====================
          [
              'name' => 'D',
              'team_id' => 13,  // Estados Unidos
              'position' => 1,
          ],
          [
              'name' => 'D',
              'team_id' => 16,  // Paraguay
              'position' => 2,
          ],
          [
              'name' => 'D',
              'team_id' => 15,  // Australia
              'position' => 3,
          ],
          [
              'name' => 'D',
              'team_id' => 14,  // Turquía
              'position' => 4,
          ],
          // ==================== GRUPO E ====================
          [
              'name' => 'E',
              'team_id' => 17,  // Alemania
              'position' => 1,
          ],
          [
              'name' => 'E',
              'team_id' => 20,  // Curazao
              'position' => 2,
          ],
          [
              'name' => 'E',
              'team_id' => 19,  // Costa de Marfil
              'position' => 3,
          ],
          [
              'name' => 'E',
              'team_id' => 18,  // Ecuador
              'position' => 4,
          ],
          // ==================== GRUPO F ====================
          [
              'name' => 'F',
              'team_id' => 21,  // Países Bajos
              'position' => 1,
          ],
          [
              'name' => 'F',
              'team_id' => 22,  // Japón
              'position' => 2,
          ],
          [
              'name' => 'F',
              'team_id' => 23,  // Suecia
              'position' => 3,
          ],
          [
              'name' => 'F',
              'team_id' => 24,  // Túnez
              'position' => 4,
          ],
          // ==================== GRUPO G ====================
          [
              'name' => 'G',
              'team_id' => 25,  // Bélgica
              'position' => 1,
          ],
          [
              'name' => 'G',
              'team_id' => 27,  // Egipto
              'position' => 2,
          ],
          [
              'name' => 'G',
              'team_id' => 26,  // Irán
              'position' => 3,
          ],
          [
              'name' => 'G',
              'team_id' => 28,  // Nueva Zelanda
              'position' => 4,
          ],
          // ==================== GRUPO H ====================
          [
              'name' => 'H',
              'team_id' => 29,  // España
              'position' => 1,
          ],
          [
              'name' => 'H',
              'team_id' => 32,  // Cabo Verde
              'position' => 2,
          ],
          [
              'name' => 'H',
              'team_id' => 31,  // Arabia Saudita
              'position' => 3,
          ],
          [
              'name' => 'H',
              'team_id' => 30,  // Uruguay
              'position' => 4,
          ],
          // ==================== GRUPO I ====================
          [
              'name' => 'I',
              'team_id' => 33,  // Francia
              'position' => 1,
          ],
          [
              'name' => 'I',
              'team_id' => 34,  // Senegal
              'position' => 2,
          ],
          [
              'name' => 'I',
              'team_id' => 36,  // Irak
              'position' => 3,
          ],
          [
              'name' => 'I',
              'team_id' => 35,  // Noruega
              'position' => 4,
          ],
          // ==================== GRUPO J ====================
          [
              'name' => 'J',
              'team_id' => 37,  // Argentina
              'position' => 1,
          ],
          [
              'name' => 'J',
              'team_id' => 39,  // Argelia
              'position' => 2,
          ],
          [
              'name' => 'J',
              'team_id' => 38,  // Austria
              'position' => 3,
          ],
          [
              'name' => 'J',
              'team_id' => 40,  // Jordania
              'position' => 4,
          ],
          // ==================== GRUPO K ====================
          [
              'name' => 'K',
              'team_id' => 41,  // Portugal
              'position' => 1,
          ],
          [
              'name' => 'K',
              'team_id' => 43,  // RD Congo
              'position' => 2,
          ],
          [
              'name' => 'K',
              'team_id' => 44,  // Uzbekistán
              'position' => 3,
          ],
          [
              'name' => 'K',
              'team_id' => 42,  // Colombia
              'position' => 4,
          ],
          // ==================== GRUPO L ====================
          [
              'name' => 'L',
              'team_id' => 45,  // Inglaterra
              'position' => 1,
          ],
          [
              'name' => 'L',
              'team_id' => 46,  // Croacia
              'position' => 2,
          ],
          [
              'name' => 'L',
              'team_id' => 48,  // Ghana
              'position' => 3,
          ],
          [
              'name' => 'L',
              'team_id' => 47,  // Panamá
              'position' => 4,
          ],
      ];

      foreach ($groups as $group) {
          Group::Create( $group );
        }

    }
}
