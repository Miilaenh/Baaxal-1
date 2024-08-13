<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $role_admin = Role::create(['name' => 'administrador']);
        $role_organizador = Role::create(['name' => 'organizador']);
        
        // Crear y asignar permisos
        Permission::create(['name' => 'control_deportes/categorias'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'control_torneos-partidos'])->syncRoles([$role_admin, $role_organizador]);
        Permission::create(['name' => 'consultar_torneos/partidos'])->syncRoles([$role_admin, $role_organizador,]);
        Permission::create(['name' => 'control_equipos'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'contabilidad/resultados_torneos'])->syncRoles([$role_organizador]);

    }
}
