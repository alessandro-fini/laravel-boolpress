<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newPost = new Post();

            $newPost->title = $faker->sentence(3);
            $newPost->slug = Str::slug($newPost->title);
            $newPost->content = $faker->text();

            $newPost->save();
        }
    }
}
