<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'SuperAdmin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Kabupaten',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Kecamatan',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Desa',
                'guard_name' => 'web'
            ]
        ];

        foreach($roles as $role) {
            Role::create([
                'name' => $role->name,
                'guard_name' => $role->guard_name,
            ]);
        }
    }
}
