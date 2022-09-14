<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Peserta CSO',
                'slug' => 'peserta-cso',
                'description' => 'Peserta CSO',
            ],
            [
                'name' => 'Peserta UIUX',
                'slug' => 'peserta-uiux',
                'description' => 'Peserta UIUX',
            ],
            [
                'name' => 'Peserta BPC',
                'slug' => 'peserta-bpc',
                'description' => 'Peserta BPC',
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
