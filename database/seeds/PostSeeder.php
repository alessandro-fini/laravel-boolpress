<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
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

            /* $users = User::all(); */ /* selezione di tutti gli utenti */
            /* $users = $users->toArray(); */ /* conversione della collection in array */
            /* $howManyUsers = Count($users); */ /* count degli elementi */
            $howManyUsers = Count(User::all()->toArray());
            $newPost->user_id = rand(1, $howManyUsers);

            $newPost->title = $faker->sentence(3);
            /* $newPost->title = 'Titolo di prova'; */

            /* --- slug --- */
            $slug = Str::slug($newPost->title);
            /* controllare se nella tabella posts sia già presente uno slug uguale alla variabile $slug */
            /* restituisce un valore numerico se true o null se false */
            $ifSlugExists = Post::where('slug', $slug)->first();
            /* salvare il risultato di $slug in una variabile temporanea */
            $tempSlug = $slug;
            /* inizializzare un contatore */
            $counter = 1;

            while ($ifSlugExists) {
                $slug = $tempSlug . '-' . $counter;
                $ifSlugExists = Post::where('slug', $slug)->first();
                $counter++;
            }

            $newPost->slug = $slug;
            /* ---slug--- */

            $newPost->content = $faker->text();

            $newPost->save();
        }
    }
}
