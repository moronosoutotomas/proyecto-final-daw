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
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'blogger']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.books.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.books.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.books.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.books.destroy'])->syncRoles([$role1, $role2]);
    }
}
