<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Test;
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

        $tests = [
            [
                'name' => 'COMPLETE BLOOD COUNT; CBC',
                'description' => '20 Parameter(s) Covered',
                'price' => 200
            ],
            [
                'name' => 'HbA1c; GLYCOSYLATED HEMOGLOBIN',
                'description' => '2 Parameter(s) Covered',
                'price' => 350
            ],
            [
                'name' => 'URINE EXAMINATION, ROUTINE; URINE, R/E',
                'description' => '16 Parameter(s) Covered',
                'price' => 80
            ],
            [
                'name' => 'GLUCOSE, FASTING (F) AND POST MEAL (PP), 2 HOURS',
                'description' => '2 Parameter(s) Covered',
                'price' => 150
            ],
            [
                'name' => 'THYROID PROFILE, TOTAL',
                'description' => '3 Parameter(s) Covered',
                'price' => 550
            ],
            [
                'name' => 'SMART REPORT',
                'description' => '1 Parameter(s) Covered',
                'price' => 200
            ],
            [
                'name' => 'GLUCOSE, FASTING (F)',
                'description' => '2 Parameter(s) Covered',
                'price' => 60
            ],
            [
                'name' => 'SWASTHFIT SUPER 2',
                'description' => '55 Parameter(s) Covered',
                'price' => 1250
            ]
        ];

        $packages = [
            [
                'name' => 'Total Health Checkup',
                'price' => '1999',
                'test_id' => json_encode(array('1', '2', '3')),

                'description' => 'Our total health checkup includes a comprehensive range of tests to help you identify any potential health concerns.
                                    Tests Included:

                                        Cholesterol Test
                                        Lipid Profile
                                        Complete Hemogram
                                        Kidney Function Test
                                        Liver Function Test
                                        Blood Sugar
                                        Thyroid Profile
                                        Urine Routine Examination'
            ],
            [
                'name' => 'Essential Wellness Check',
                'price' => '999',
                'test_id' => json_encode(array('1', '2', '3')),

                'description' => 'Our essential wellness checkup includes basic tests to give you an overview of your health.
                                    Tests Included:

                                        Complete Blood Count (CBC)
                                        Blood Sugar
                                        Lipid Profile
                                        Liver Function Test
                                        Kidney Function Test'
            ],
            [
                'name' => 'Basic Health Screening',
                'price' => '1200',
                'test_id' => json_encode(array('1', '2', '3')),

                'description' => 'Our basic health screening includes basic tests to give you an overview of your health.
                                    Tests Included:

                                        Complete Blood Count (CBC)
                                        Lipid Profile
                                        Liver Function Test
                                        Kidney Function Test
                                        Thyroid Profile'
            ],
            [
                'name' => 'Advanced Health Plus',
                'price' => '2500',
                'test_id' => json_encode(array('1', '2', '3')),

                'description' => 'Our advanced health plus package includes additional tests to provide a more comprehensive overview of your health.
                                    Tests Included:

                                        Complete Blood Count (CBC)
                                        Lipid Profile
                                        Liver Function Test
                                        Kidney Function Test
                                        Thyroid Profile
                                        Vitamin D
                                        Vitamin B12'
            ],
            [
                'name' => 'Basic Health Plus',
                'price' => '800',
                'test_id' => json_encode(array('1', '2', '3')),
                'description' => 'Our basic health plus package includes additional tests to provide a more comprehensive overview of your health.
                                    Tests Included:

                                        Complete Blood Count (CBC)
                                        Blood Sugar
                                        Lipid Profile
                                        Liver Function Test'
            ],
            [
                'name' => 'Advanced Diagnostic Package',
                'price' => '1500',
                'test_id' => json_encode(array('1', '2', '3')),

                'description' => 'Our advanced diagnostic package includes additional tests to provide a more detailed assessment of your overall health.
                                    Tests Included:

                                        Complete Blood Count (CBC)
                                        Blood Sugar
                                        Lipid Profile
                                        Liver Function Test
                                        Kidney Function Test
                                        Thyroid Profile'
            ],
            [
                'name' => 'Complete Wellness Profile',
                'price' => '2000',
                'test_id' => json_encode(array('1', '2', '3')),
                'description' => 'Our complete wellness profile includes additional tests to provide a comprehensive assessment of your overall health.
                                    Tests Included:

                                        Complete Blood Count (CBC)
                                        Blood Sugar
                                        Lipid Profile
                                        Liver Function Test
                                        Kidney Function Test
                                        Thyroid Profile
                                        Vitamin D
                                        Vitamin B12'
            ]
        ];


        foreach ($tests as $test) {
            Test::create($test);
        }
        foreach ($packages as $package) {
            Package::create($package);
        }


    }
}
