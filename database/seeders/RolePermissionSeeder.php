<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $staff = Role::create(['name' => 'staff']);

        $permissions = ['asset.view', 'asset.create', 'asset.edit', 'asset.delete'];

        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

        $admin->givePermissionTo(Permission::all());
        $staff->givePermissionTo(['asset.view']);
    }
}
