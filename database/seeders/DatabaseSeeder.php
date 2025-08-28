<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123456789'
        ]);
        user::factory(10)->create()->each(function($user) {
            Post::factory(1)->create([
                'user_id' => $user->id
            ]);
        });
        $backend = Category::create([
            'name' => 'Backend',
            'slug' => 'backend',
        ]);

        $frontend = Category::create([
            'name' => 'Frontend',
            'slug' => 'frontend',
        ]);

        // اختصاص دسته به هر پست
        $categories = [$backend->id, $frontend->id];

        Post::all()->each(function ($post) use ($categories) {
            $post->category_id = collect($categories)->random();
            $post->save();
        });

        Setting::factory(5)->create();

        // $role = Role::create(['name' => 'writer']);
        // $user->assignRole($role);
        
        Comment::factory(3)->create();
    }
}
