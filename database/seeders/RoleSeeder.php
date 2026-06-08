<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // roles
        $r_admins = Role::create(['guard_name' => 'web', 'name' => 'Administrador de Sistema']);
        $r_admin = Role::create(['guard_name' => 'web', 'name' => 'Administrador']);
        $r_gambler = Role::create(['guard_name' => 'web', 'name' => 'Jugador']);
        $r_suspendido = Role::create(['guard_name' => 'web', 'name' => 'Suspendido']);
        $r_eliminado = Role::create(['guard_name' => 'web', 'name' => 'Eliminado']);

        // permissions
        Permission::create(['guard_name' => 'web', 'name' => 'Administrar aplicación'])->syncRoles($r_admins); // permiso de administradore general, permitie configurar la aplicacion
        Permission::create(['guard_name' => 'web', 'name' => 'Administrar operación'])->syncRoles($r_admins, $r_admin);
        Permission::create(['guard_name' => 'web', 'name' => 'Modificar perfil'])->syncRoles($r_admins, $r_admin, $r_gambler);
        Permission::create(['guard_name' => 'web', 'name' => 'Dashboard'])->syncRoles($r_admins, $r_admin, $r_gambler);
        Permission::create(['guard_name' => 'web', 'name' => 'Jugar'])->syncRoles($r_gambler);
        Permission::create(['guard_name' => 'web', 'name' => 'Ninguno'])->syncRoles($r_suspendido, $r_eliminado);

    }
}
