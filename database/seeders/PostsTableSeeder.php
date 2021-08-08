<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('posts')->truncate();

        $posts=[];
        $faker = Factory::create();

        for($i = 1; $i <= 10;$i++)
        {
            $image = "Post_Image_".rand(1,5).".jpg";
            $date = date("Y-m-d H:i:s", strtotime("2021-04-20 10:00:00 +{$i} days"));
            $posts[] =[
                'user_id' => "2",
                'judul' => $faker->sentence(rand(10,15)),
                'content' => $faker->paragraph(rand(8,12),true),
                'excerpt' => $faker->text(rand(100,200)),
                'slug' => $faker->slug(),
                'gambar' =>rand(0,1) == 1? $image : NULL,
                'kategori_id'=>rand(1,3),
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }
        \DB::table('posts')->insert($posts);
    }
}
