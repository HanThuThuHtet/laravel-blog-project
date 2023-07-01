<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Category::truncate();
        // Blog::truncate();

        $ishikawa = User::factory()->create(['name' => 'ishikawa' , 'username' => 'ishikawa']);
        $todoroki = User::factory()->create(['name' => 'todoroki' , 'username' => 'todoroki']);


        $frontend = Category::factory()->create([
            'name' => 'frontend',
            'slug' => 'frontend'
            //col overwrite
        ]);

        $backend = Category::factory()->create([
            'name' => 'backend',
            'slug' => 'backend'
            //col overwrite
        ]);



        // User::factory(1)->create();
        Blog::factory(2)->create(['category_id' => $frontend->id,'user_id' => $ishikawa->id]);
        Blog::factory(2)->create(['category_id' => $backend->id,'user_id' => $todoroki->id]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



    }
}
