<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags_data = [
            [
                'title' => 'برای مدرسان',
                'title_abbr' => 'how-to-teach',
            ],
            [
                'title' => 'کمک‌آموزشی',
                'title_abbr' => 'enrichment',
            ],
            [
                'title' => 'آزمون‌ها',
                'title_abbr' => 'test',
            ],
            [
                'title' => 'زیرساختی',
                'title_abbr' => 'infrastructure',
            ],
        ];
        foreach ($tags_data as $tag_data) {
            $tag = new Tag;
            $tag->title = $tag_data['title'];
            $tag->title_abbr = $tag_data['title_abbr'];
            $tag->intro = '';
            $tag->save();
        }
    }
}
