<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageURL = 'https://static.thenounproject.com/png/3237155-200.png';

        $fileName = Str::random(20) . '.jpg';

        $imageContents = file_get_contents($imageURL);
        Storage::disk('public')->put('/images/profile_pictures/' . $fileName, $imageContents);

        User::create([
            'profile_image' =>      'images/profile_pictures/' . $fileName,
            'name'          =>      'Allan Justine Mascariñas',
            'address'       =>      'Tinangnan, Tubigon, Bohol',
            'age'           =>      '22',
            'phone'         =>      '09512072888',
            'sex'           =>      'Male',
            'email'         =>      'labya31@gmail.com',
            'password'      =>      bcrypt('password') //password
        ]);
    }
}
