<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'first_name' => 'Sarada',
            'last_name' => 'Bhagya',
            'email' => 'sarada@axus.lk',
            'dob' => '2023-05-02',
            'password' => bcrypt('sarada@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $roles = Role::all();
        foreach ($roles as $role) {
            $superAdmin->assignRole([$role->id]);
        }
    }
}
