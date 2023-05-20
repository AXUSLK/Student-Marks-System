<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher = User::create([
            'id' => '2',
            'first_name' => 'Sachin',
            'last_name' => 'Kavindu',
            'email' => 'sachin@gmail.lk',
            'dob' => '2023-05-02',
            'status' => true,
            'class' => 5,
            'password' => bcrypt('sachin@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $student1 = User::create([
            'id' => '3',
            'first_name' => 'Sandew',
            'last_name' => 'Dullewa',
            'email' => 'sandew@gmail.lk',
            'dob' => '2023-05-02',
            'status' => true,
            'class' => 6,
            'password' => bcrypt('sandew@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $student2 = User::create([
            'id' => '4',
            'first_name' => 'Pasan',
            'last_name' => 'Vithana',
            'dob' => '2023-05-02',
            'status' => true,
            'class' => 5,
            'email' => 'pasan@gmail.lk',
            'password' => bcrypt('pasan@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $teacher->assignRole([2]);
        $student1->assignRole([3]);
        $student2->assignRole([3]);

        $subjects = [2 => 2, 3 => 3, 5 => 5];
        $teacher->teacherSubject()->attach($subjects);

        $subjects = [1 => 1, 2 => 2, 3 => 3, 5 => 5];
        $student1->studentSubject()->attach($subjects);
    }
}
