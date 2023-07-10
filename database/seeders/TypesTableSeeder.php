<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Uncategorized',
                'description' => 'Projects that do not fall into any specific category.',
            ],
            [
                'name' => 'Front-end',
                'description' => 'Projects primarily focusing on the visual elements, user interface and user experience.',
            ],
            [
                'name' => 'Back-end',
                'description' => 'Projects dealing with server-side logic, data management and server configuration.',
            ],
            [
                'name' => 'Full stack',
                'description' => 'Projects that involve both front-end and back-end development.',
            ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
