<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;
use Faker\Factory as FakerFactory;


class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create three sample blog posts
        Blog::create([
            'title' => 'First Blog Post',
            'content' => 'This is the content of the first blog post.',
            'author_id' => 1,
        ]);
    
        Blog::create([
            'title' => 'Second Blog Post',
            'content' => 'This is the content of the second blog post.',
            'author_id' => 2,
        ]);
    
        Blog::create([
            'title' => 'Third Blog Post',
            'content' => 'This is the content of the third blog post.',
            'author_id' => 1,
        ]);

        Blog::create([
            'title' => '4th Blog Post',
            'content' => 'This is the content of the 4th blog post.',
            'author_id' => 2,
        ]);

        $faker = FakerFactory::create();

        $users = User::all();

        for ($i = 0; $i < 10; $i++) {
            $blog = new Blog();
            $blog->title = $faker->sentence();
            // $blog->content = $faker->paragraphs(10, true);
            // $blog->content = $faker->text(1500);
            $blog->content = $faker->words(500, true);
            $blog->author_id = $users->random()->id;
            $blog->save();
        }
    }
    
}
