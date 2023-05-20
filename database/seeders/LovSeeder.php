<?php

namespace Database\Seeders;

use App\Models\Lov;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LovSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lov::create([
            'id' => 1,
            'name' => 'Grade 01',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 2,
            'name' => 'Grade 02',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 3,
            'name' => 'Grade 03',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 4,
            'name' => 'Grade 04',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 5,
            'name' => 'Grade 05',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 6,
            'name' => 'Grade 06',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 7,
            'name' => 'Grade 07',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 8,
            'name' => 'Grade 08',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 9,
            'name' => 'Grade 09',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 10,
            'name' => 'Grade 10',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 11,
            'name' => 'Grade 11',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 12,
            'name' => 'Grade 12',
            'lov_category_id' => 1,
        ]);

        Lov::create([
            'id' => 13,
            'name' => 'Grade 13',
            'lov_category_id' => 1,
        ]);
    }
}
