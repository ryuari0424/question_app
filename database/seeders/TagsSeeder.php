<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => '仕事',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '恋愛',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '健康',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '教育',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '政治',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '経済',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Tag::insert($data);
    }
}
