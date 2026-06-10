<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intranet\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $team = Team::create(['name' => 'México','ranking' => '15','group' => 'A','position' => '1','group_position' => 'A1']);
      $team = Team::create(['name' => 'Corea del Sur','ranking' => '25','group' => 'A','position' => '3','group_position' => 'A3']);
      $team = Team::create(['name' => 'República Checa','ranking' => '41','group' => 'A','position' => '4','group_position' => 'A4']);
      $team = Team::create(['name' => 'Sudáfrica','ranking' => '60','group' => 'A','position' => '2','group_position' => 'A2']);
      $team = Team::create(['name' => 'Suiza','ranking' => '19','group' => 'B','position' => '4','group_position' => 'B4']);
      $team = Team::create(['name' => 'Canadá','ranking' => '30','group' => 'B','position' => '1','group_position' => 'B1']);
      $team = Team::create(['name' => 'Qatar','ranking' => '55','group' => 'B','position' => '3','group_position' => 'B3']);
      $team = Team::create(['name' => 'Bosnia y Herzegovina','ranking' => '65','group' => 'B','position' => '2','group_position' => 'B2']);
      $team = Team::create(['name' => 'Brasil','ranking' => '6','group' => 'C','position' => '1','group_position' => 'C1']);
      $team = Team::create(['name' => 'Marruecos','ranking' => '8','group' => 'C','position' => '2','group_position' => 'C2']);
      $team = Team::create(['name' => 'Escocia','ranking' => '43','group' => 'C','position' => '4','group_position' => 'C4']);
      $team = Team::create(['name' => 'Haití','ranking' => '83','group' => 'C','position' => '3','group_position' => 'C3']);
      $team = Team::create(['name' => 'Estados Unidos','ranking' => '16','group' => 'D','position' => '1','group_position' => 'D1']);
      $team = Team::create(['name' => 'Turquía','ranking' => '22','group' => 'D','position' => '4','group_position' => 'D4']);
      $team = Team::create(['name' => 'Australia','ranking' => '27','group' => 'D','position' => '3','group_position' => 'D3']);
      $team = Team::create(['name' => 'Paraguay','ranking' => '40','group' => 'D','position' => '2','group_position' => 'D2']);
      $team = Team::create(['name' => 'Alemania','ranking' => '10','group' => 'E','position' => '1','group_position' => 'E1']);
      $team = Team::create(['name' => 'Ecuador','ranking' => '23','group' => 'E','position' => '4','group_position' => 'E4']);
      $team = Team::create(['name' => 'Costa de Marfil','ranking' => '34','group' => 'E','position' => '3','group_position' => 'E3']);
      $team = Team::create(['name' => 'Curazao','ranking' => '82','group' => 'E','position' => '2','group_position' => 'E2']);
      $team = Team::create(['name' => 'Países Bajos','ranking' => '7','group' => 'F','position' => '1','group_position' => 'F1']);
      $team = Team::create(['name' => 'Japón','ranking' => '18','group' => 'F','position' => '2','group_position' => 'F2']);
      $team = Team::create(['name' => 'Suecia','ranking' => '38','group' => 'F','position' => '3','group_position' => 'F3']);
      $team = Team::create(['name' => 'Túnez','ranking' => '44','group' => 'F','position' => '4','group_position' => 'F4']);
      $team = Team::create(['name' => 'Bélgica','ranking' => '9','group' => 'G','position' => '1','group_position' => 'G1']);
      $team = Team::create(['name' => 'Irán','ranking' => '21','group' => 'G','position' => '3','group_position' => 'G3']);
      $team = Team::create(['name' => 'Egipto','ranking' => '29','group' => 'G','position' => '2','group_position' => 'G2']);
      $team = Team::create(['name' => 'Nueva Zelanda','ranking' => '85','group' => 'G','position' => '4','group_position' => 'G4']);
      $team = Team::create(['name' => 'España','ranking' => '2','group' => 'H','position' => '1','group_position' => 'H1']);
      $team = Team::create(['name' => 'Uruguay','ranking' => '17','group' => 'H','position' => '4','group_position' => 'H4']);
      $team = Team::create(['name' => 'Arabia Saudita','ranking' => '61','group' => 'H','position' => '3','group_position' => 'H3']);
      $team = Team::create(['name' => 'Cabo Verde','ranking' => '69','group' => 'H','position' => '2','group_position' => 'H2']);
      $team = Team::create(['name' => 'Francia','ranking' => '1','group' => 'I','position' => '1','group_position' => 'I1']);
      $team = Team::create(['name' => 'Senegal','ranking' => '14','group' => 'I','position' => '2','group_position' => 'I2']);
      $team = Team::create(['name' => 'Noruega','ranking' => '31','group' => 'I','position' => '4','group_position' => 'I4']);
      $team = Team::create(['name' => 'Irak','ranking' => '57','group' => 'I','position' => '3','group_position' => 'I3']);
      $team = Team::create(['name' => 'Argentina','ranking' => '3','group' => 'J','position' => '1','group_position' => 'J1']);
      $team = Team::create(['name' => 'Austria','ranking' => '24','group' => 'J','position' => '3','group_position' => 'J3']);
      $team = Team::create(['name' => 'Argelia','ranking' => '28','group' => 'J','position' => '2','group_position' => 'J2']);
      $team = Team::create(['name' => 'Jordania','ranking' => '63','group' => 'J','position' => '4','group_position' => 'J4']);
      $team = Team::create(['name' => 'Portugal','ranking' => '5','group' => 'K','position' => '1','group_position' => 'K1']);
      $team = Team::create(['name' => 'Colombia','ranking' => '13','group' => 'K','position' => '4','group_position' => 'K4']);
      $team = Team::create(['name' => 'RD Congo','ranking' => '46','group' => 'K','position' => '2','group_position' => 'K2']);
      $team = Team::create(['name' => 'Uzbekistán','ranking' => '50','group' => 'K','position' => '3','group_position' => 'K3']);
      $team = Team::create(['name' => 'Inglaterra','ranking' => '4','group' => 'L','position' => '1','group_position' => 'L1']);
      $team = Team::create(['name' => 'Croacia','ranking' => '11','group' => 'L','position' => '2','group_position' => 'L2']);
      $team = Team::create(['name' => 'Panamá','ranking' => '33','group' => 'L','position' => '4','group_position' => 'L4']);
      $team = Team::create(['name' => 'Ghana','ranking' => '74','group' => 'L','position' => '3','group_position' => 'L3']);
    }
}
