<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $roles = ['admin', 'staff', 'auditor', 'viewer'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // Permissions
        $permissions = [
            'asset.view', 'asset.create', 'asset.edit', 'asset.delete',
            'user.manage', 'audit.schedule', 'audit.run',
        ];
        foreach ($permissions as $permName) {
            Permission::firstOrCreate(['name' => $permName, 'guard_name' => 'web']);
        }

        // Assign all permissions to admin
        $admin = Role::where('name', 'admin')->first();
        $admin->syncPermissions(Permission::all());

        // Assign view permission to staff, viewer, auditor
        foreach (['staff', 'auditor', 'viewer'] as $r) {
            $role = Role::where('name', $r)->first();
            $role->syncPermissions(['asset.view']);
        }
    }
}
