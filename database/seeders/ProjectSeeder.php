<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $post = new Project();
            $post->title = $faker->sentence(4);
            $post->slug = Str::slug($post->title, '-');
            $post->description = $faker->paragraphs(asText: true);
            $post->image = $faker->imageUrl(category: 'Posts', format: 'jpg');
            $post->link_ghit = $faker->url();
            $post->link_site = $faker->url();
            $post->save();
        }
    }
}
