<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Author;
use App\AuthorInfo;
use App\Post;
use App\Comment;
use App\Tag;

class BoolpressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = ['cronaca', 'sport', 'gossip', 'economia', 'salute', 'scienza'];
        foreach($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }

        for ($i = 0; $i < 5; $i++) {

            $author = new Author();
            $author->username = $faker->userName();
            $author->mail = $faker->email();
            $author->save();

            $authorInfo = new AuthorInfo();
            $authorInfo->name = $faker->name();
            $authorInfo->pic = 'https://picsum.photos/seed/' . rand(0, 1000) . '/200/200';
            $authorInfo->birthdate = $faker->dateTime();

            $author->info()->save($authorInfo);

            for($x = 0; $x < rand(1, 4); $x++) {
                $post = new Post();
                $post->title = $faker->sentence();
                $post->text = $faker->paragraph();

                $author->post()->save($post);

                for($y = 0; $y < rand(1, 4); $y++) {
                    $comment = new Comment();
                    $comment->text = $faker->paragraph();
    
                    $post->comment()->save($comment);
                }    
            }
        }
    }
}
