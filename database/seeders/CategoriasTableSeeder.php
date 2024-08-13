<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Categoria; 
use App\Models\Torneo; 

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            ['nombre' => Crypt::encryptString('Sub 17 Femenino')],
            ['nombre' => Crypt::encryptString('Otra categoría')],
            ['nombre' => Crypt::encryptString('Sub 15 Femenino')],
            ['nombre' => Crypt::encryptString('Sub 20 Masculino')],
            ['nombre' => Crypt::encryptString('Juvenil Masculino')],
            ['nombre' => Crypt::encryptString('Tocayo Hub')],
        ]);

        $logoPath = 'tournament-avatars/Azul.jpg';
        $userId = 1;
        $userId2 = 2;

        Torneo::create([
            'nombre' => Crypt::encryptString('Liga Danuvio azul'),
            'descripcion' => Crypt::encryptString('Torneo de Fútbol amateur'),
            'logo' => $logoPath,
            'fecha_inicio' => Crypt::encryptString('2024-05-01'),
            'fecha_fin' => Crypt::encryptString('2024-05-15'),
            'ubicacion' => Crypt::encryptString('Cancha deportiva de San Martin Texmelucan'),
            'categoria_id' => '1',
            'user_id' => $userId,
            'privado' => 'false',
        ]);

        Torneo::create([
            'nombre' => Crypt::encryptString('Liga escolar Secundaria Pedro Maria'),
            'descripcion' => Crypt::encryptString('Torneo de jóvenes'),
            'logo' => $logoPath,
            'fecha_inicio' => Crypt::encryptString('2024-05-01'),
            'fecha_fin' => Crypt::encryptString('2024-05-15'),
            'ubicacion' => Crypt::encryptString('Cancha deportiva de San Martin Texmelucan'),
            'categoria_id' =>'2',
            'user_id' => $userId2,
            'privado' => 'false',
        ]);

        Torneo::create([
            'nombre' => Crypt::encryptString('Torneo de San juan'),
            'descripcion' => Crypt::encryptString('Torneo de Voleibol recreativo'),
            'logo' => $logoPath,
            'fecha_inicio' => Crypt::encryptString('2024-07-01'),
            'fecha_fin' => Crypt::encryptString('2024-07-15'),
            'ubicacion' => Crypt::encryptString('Plaza de San Juan Tetela'),
            'categoria_id' => '3',
            'user_id' => $userId2,
            'privado' => 'true',
        ]);

        Torneo::create([
            'nombre' => Crypt::encryptString('Torneo de Tenis'),
            'descripcion' => Crypt::encryptString('Torneo de Tenis profesional'),
            'logo' => $logoPath,
            'fecha_inicio' => Crypt::encryptString('2024-08-01'),
            'fecha_fin' => Crypt::encryptString('2024-08-15'),
            'ubicacion' => Crypt::encryptString('Ciudad de Puebla'),
            'categoria_id' => '4',
            'user_id' => $userId,
            'privado' => 'false',
        ]);

        Torneo::create([
            'nombre' => Crypt::encryptString('Torneo de Fútbol en la Playa'),
            'descripcion' => Crypt::encryptString('Torneo de Fútbol en la playa'),
            'logo' => $logoPath,
            'fecha_inicio' => Crypt::encryptString('2024-09-01'),
            'fecha_fin' => Crypt::encryptString('2024-09-15'),
            'ubicacion' => Crypt::encryptString('Acapulco'),
            'categoria_id' => '5',
            'user_id' => $userId2,
            'privado' => 'false',
        ]);

        Torneo::create([
            'nombre' => Crypt::encryptString('Torneo de Baloncesto en la Piscina'),
            'descripcion' => Crypt::encryptString('Torneo de Baloncesto en la piscina'),
            'logo' => $logoPath,
            'fecha_inicio' => Crypt::encryptString('2024-10-01'),
            'fecha_fin' => Crypt::encryptString('2024-10-15'),
            'ubicacion' => Crypt::encryptString('Piscina F'),
            'categoria_id' => '6',
            'user_id' => $userId,
            'privado' => 'false',
        ]);
    }
}
