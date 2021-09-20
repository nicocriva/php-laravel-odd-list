<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <10; $i++){
            $newPost = new Post();
            $newPost->title = 'Post numero ' . ($i + 1);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, ipsum numquam. Consectetur nihil fugit dolor eaque enim officia dolores voluptatem ducimus dicta. Ab ut odit explicabo quibusdam consequatur quam officiis.';
            $newPost->save();
        }
    }
}
