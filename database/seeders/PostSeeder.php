<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

            $post = new Post();
            $post->title = $faker->sentence(4);
            $post->slug = Str::slug($post->title, '-');
            $post->text = $faker->paragraphs(asText: true);
            $post->image = $faker->imageUrl(category: 'Posts', format: 'jpg');
            $post->save();
        }
    }
}
