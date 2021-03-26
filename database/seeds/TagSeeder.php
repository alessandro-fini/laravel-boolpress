<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newTag = new Tag();

            $newTag->name = $faker->words(3, true);

            $slug = Str::slug($newTag->name);
            $ifSlugExists = Tag::where('slug', $slug)->first();
            $tempSlug = $slug;
            $counter = 1;
            while ($ifSlugExists) {
                $slug = $tempSlug . '-' . $counter;
                $ifSlugExists = Tag::where('slug', $slug)->first();
                $counter++;
            }
            $newTag->slug = $slug;

            $newTag->save();
        }
    }
}
