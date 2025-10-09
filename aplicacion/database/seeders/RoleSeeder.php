<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $administrador = Role::create(['name' => 'administrador']);
        $bibliotecario = Role::create(['name' => 'bibliotecario']);
        $lector = Role::create(['name' => 'lector']);

        // Permisos de administración (solo administrador)
        Permission::create(['name' => 'admin.access'])->assignRole($administrador);
        Permission::create(['name' => 'admin.users.manage'])->assignRole($administrador);
        Permission::create(['name' => 'admin.roles.manage'])->assignRole($administrador);

        // Permisos de gestión de libros (administrador y bibliotecario)
        Permission::create(['name' => 'books.create'])->syncRoles([$administrador, $bibliotecario]);
        Permission::create(['name' => 'books.edit'])->syncRoles([$administrador, $bibliotecario]);
        Permission::create(['name' => 'books.delete'])->syncRoles([$administrador, $bibliotecario]);

        // Permisos de gestión de ediciones (administrador y bibliotecario)
        Permission::create(['name' => 'editions.create'])->syncRoles([$administrador, $bibliotecario]);
        Permission::create(['name' => 'editions.edit'])->syncRoles([$administrador, $bibliotecario]);
        Permission::create(['name' => 'editions.delete'])->syncRoles([$administrador, $bibliotecario]);

        // Permisos de interacción (administrador, bibliotecario y lector)
        Permission::create(['name' => 'reviews.create'])->syncRoles([$administrador, $bibliotecario, $lector]);
        Permission::create(['name' => 'bookshelves.manage'])->syncRoles([$administrador, $bibliotecario, $lector]);
    }
}
