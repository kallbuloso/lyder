<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create(app()->getLocale());
        DB::table('posts')->truncate();
        DB::table('post_tags')->truncate();
        // $date = Carbon::create(2018, 10, 10, 10);
        $date = Carbon::now();
        $date->subDays(-1);
        $qntd = '25';
        
        for ($i=1; $i <$qntd ; $i++) {
            
            $publishedDate = clone($date);
            // $tamps = Carbon::now()->subDays(100)->addDays($i);
            $image = "Post_image_" . rand(1,5) . "jpg";
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            DB::table('posts')->insert([
                'author_id'     => "{$i}",
                'title'     => $title,
                'url'     => str_slug($title),
                'slug'      => $faker->slug(),
                'excerpt'       => $faker->text(rand(250,300)),
                'body'      => $faker->paragraphs(rand(10,15),true),
                'image'     => rand(0,1) == 1 ? $image : NULL,
                'category_id' => rand(1,3),
                'created_at' => clone($date),
                'updated_at' => clone($date),
                'published_at' => $publishedDate->subDays($i) //$i > 5 ? $publishedDate :(rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4))
            ]);
        }
        // categoryes
        DB::table('categories')->insert([
            'name' => 'Projetos',
            'created_at' => clone($date),
            'updated_at' => clone($date)
        ]);

        DB::table('categories')->insert([
            'name' => 'Eletrônica',
            'created_at' => clone($date),
            'updated_at' => clone($date)
        ]);

        DB::table('categories')->insert([
            'name' => 'Sistemas',
            'created_at' => clone($date),
            'updated_at' => clone($date)
        ]);
        
        // tags
        for ($i=1; $i <$qntd ; $i++) {
            DB::table('tags')->insert([
                'name' => $faker->lastname(),
                'created_at' => clone($date),
                'updated_at' => clone($date)
            ]);
        }

        // Posts Tags
        for ($i=1; $i <$qntd ; $i++) {
            DB::table('post_tags')->insert([
                'post_id' => rand(1,30),
                'tag_id' => rand(1,30),
                'created_at' => clone($date),
                'updated_at' => clone($date)
            ]);
        }

        //
    }
}
