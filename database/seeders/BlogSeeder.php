<?php

namespace Database\Seeders;

use App\Models\Blogs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Query\Expression;
use App\Models\Languages;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Blogs::create([
          'title' => '{"en":"asdsadasda"}',
          'description' => '{"en":"asdsadasda"}',
          'created_at' => now(),
          'updated_at' => now(),
      ]);


        $languages = Languages::all();

/*         for ($i = 0; $i < 10; $i++) {
            // JSON_OBJECT stringini oluşturma
            $blogDescription = 'JSON_OBJECT(';
            foreach ($languages as $language) {
                $blogDescription .= '"' . $language->name . '", "' . $faker->sentence() . '", ';
            }
            // Sondaki fazladan virgül ve boşluğu kaldırın
            $blogDescription = rtrim($blogDescription, ', ');
            $blogDescription .= ')';

            // JSON_ARRAY oluşturma
            $blogTitle = 'JSON_ARRAY("' . implode('","', $faker->words(3)) . '")';


            
            DB::table('blogs')->insert([
                'blog_title' => new Expression($blogTitle),
                'created_by' => 'admin',
                'blog_description' => new Expression($blogDescription),
                'slug' => Str::slug($faker->sentence(3)),
                'blog_thumbnail' => $faker->imageUrl(640, 480, 'nature', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]); */
        }
    
}
