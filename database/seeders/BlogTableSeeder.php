<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create blog-photos directory if it doesn't exist
        $blogPhotosDirectory = public_path('storage/blog-photos');
        if (!File::exists($blogPhotosDirectory)) {
            File::makeDirectory($blogPhotosDirectory, 0755, true);
        }
        
        $users = User::all();
        $faker = FakerFactory::create();

        for ($i = 0; $i < 6; $i++) {
            $blog = new Blog();
            $blog->image = $faker->image('public/storage/blog-photos',400,300, null, false) ;
            $blog->title = $faker->sentence();
            $blog->content = $faker->words(500, true);
            $blog->author_id = $users->random()->id;
            $blog->save();
        }
    }
    
}
