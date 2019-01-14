<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Storage::disk('public')->deleteDirectory('posts');
        
        $faker =  Faker::create(app()->getLocale());
        DB::table('posts')->truncate();
        DB::table('post_tag')->truncate();
        // $date = Carbon::create(2018, 10, 10, 10);
        $date = Carbon::now();
        $date->subDays(-1);
        $qntd = '30';

        $publishedDate = clone($date);
        // $tamps = Carbon::now()->subDays(100)->addDays($i);
        $image = "Post_image_" . rand(1,5) . "jpg";
        $title = 'Minha Page Test 1';
        DB::table('posts')->insert([
            'author_id'     => '1',
            'title'     => $title,
            'url'     => str_slug($title),
            'excerpt'       => 'Este é um pequeno resumo da minha page de teste para o blog.',
            'body'      => '<h2><strong>Getting out there</strong></h2>

            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            
            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
            
            <h2><strong>Chase your dreams</strong></h2>
            
            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
            
            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
            
            <h2><strong>Be Responsible</strong></h2>
            
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            
            <h2><strong>Provide value</strong></h2>
            
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            
            <h2><span style="color:#e74c3c"><strong>What comes next</strong></span></h2>
            
            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>',
            'image'     => rand(0,1) == 1 ? $image : NULL,
            'category_id' => rand(1,3),
            'created_at' => clone($date),
            'updated_at' => clone($date),
            'published_at' => Carbon::now() //$i > 5 ? $publishedDate :(rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4))
        ]);
        
        for ($i=0; $i <$qntd ; $i++) {
            
            $publishedDate = clone($date);
            // $tamps = Carbon::now()->subDays(100)->addDays($i);
            $image = "Post_image_" . rand(1,5) . "jpg";
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            DB::table('posts')->insert([
                'author_id'     => rand(1,$qntd),
                'title'     => $faker->text(rand(10,50)),
                'url'     => str_slug($title),
                'excerpt'       => $faker->text(rand(90,150)),
                'body'      => $faker->paragraphs(rand(10,20),true),
                'image'     => rand(0,1) == 1 ? $image : NULL,
                'category_id' => rand(1,3),
                'created_at' => clone($date),
                'updated_at' => clone($date),
                'published_at' => $publishedDate->subDays($i) //$i > 5 ? $publishedDate :(rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4))
            ]);
        }


        // categoryes
        $names = ['Projetos', 'Eletrônica', 'Sistemas', 'Controles'];
        foreach ($names as $name) {
            DB::table('categories')->insert([
                'name' => $name,
                'url' => str_slug($name),
                'created_at' => clone($date),
                'updated_at' => clone($date)
            ]);
        }
        
        // tags & post_tags
        for ($i=0; $i <$qntd ; $i++) {
            $name = $faker->lastname();
            DB::table('tags')->insert([
                'name' => $name,
                'url' => str_slug($name),
                'created_at' => clone($date),
                'updated_at' => clone($date)
            ]);
                
            DB::table('post_tag')->insert([
                'post_id' => rand(1,$qntd),
                'tag_id' => rand(1,$qntd),
                'created_at' => clone($date),
                'updated_at' => clone($date)
            ]);
        }

        //
    }
}
