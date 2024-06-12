<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Permission::create(['name' => 'book test',]);
        Permission::create(['name' => 'add tests',]);
        Permission::create(['name' => 'edit tests',]);
        Permission::create(['name' => 'access admin',]);
        Permission::create(['name' => 'view all patient data',]);
        Permission::create(['name' => 'edit all patient data',]);
        Permission::create(['name' => 'view self patient data',]);
        Permission::create(['name' => 'edit self patient data',]);
        Permission::create(['name' => 'view report',]);
        Permission::create(['name' => 'release report',]);
        Permission::create(['name' => 'edit report',]);
        Permission::create(['name' => 'view feedback',]);



        $admin = Role::create(['name' => 'admin',]);
        $patient = Role::create(['name' => 'patient',]);
        $manager = Role::create(['name' => 'manager',]);

        $adminRoles = [
            'access admin',
            'view all patient data',
            'edit all patient data',
            'release report',
            'edit report',
            'view feedback',
            'add tests',
            'edit tests'
        ];
        $managerRoles = [
            'access admin',
            'view all patient data',
            'edit all patient data',
            'release report',
            'edit report',
            'view feedback',
            'add tests',
            'edit tests'
        ];

        $patientRoles = [
            'book test',
            'view report',
            'view self patient data',
            'edit self patient data',

        ];

        $admin->givePermissionTo($adminRoles);
        $manager->givePermissionTo($managerRoles);
        $patient->givePermissionTo($patientRoles);

    }
}
