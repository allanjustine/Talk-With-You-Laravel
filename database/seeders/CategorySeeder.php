<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Feeling happy', 'remarks' => 'Happy lang'],
            ['name' => 'Feeling sad', 'remarks' => 'Sad ko'],
            ['name' => 'Feeling broken', 'remarks' => 'Broken ko'],
            ['name' => 'Feeling emotional', 'remarks' => 'Nag emote ko'],
            ['name' => 'Feeling blessed', 'remarks' => 'Yey blessed ko!'],
            ['name' => 'Feeling in love', 'remarks' => 'In love kayko']
        ];

        foreach ($categories as $category) {
            Category::create([
                'name'      =>      $category['name'],
                'remarks'   =>      $category['remarks']
            ]);
        }
    }
}
