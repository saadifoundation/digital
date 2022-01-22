<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels_data = [
            [
                'title' => 'نوآموز',
                'title_abbr' => 'n',
                'order' => 1,
                'intro' => 'این سطح اولین سطح آموزشی بنیاد سعدی است.',
                'low_color' => 'fed09e',
                'color' => 'f7941d',
                'high_color' => 'f16621',
            ],
            [
                'title' => 'مقدماتی',
                'title_abbr' => 'a',
                'order' => 2,
                'intro' => 'این سطح دومین سطح آموزشی بنیاد سعدی است.',
                'low_color' => 'fbbea9',
                'color' => 'ee1c25',
                'high_color' => 'ba131a',
            ],
            [
                'title' => 'پیش‌میانی',
                'title_abbr' => 'b1',
                'order' => 3,
                'intro' => 'این سطح سومین سطح آموزشی بنیاد سعدی است.',
                'low_color' => 'c6e9fc',
                'color' => '8dd8f8',
                'high_color' => '3daed6',
            ],
            [
                'title' => 'میانی',
                'title_abbr' => 'b2',
                'order' => 4,
                'intro' => 'این سطح چهارمین سطح آموزشی بنیاد سعدی است.',
                'low_color' => 'bad2ee',
                'color' => '2d93d1',
                'high_color' => '2270a0',
            ],
            [
                'title' => 'فوق‌میانی',
                'title_abbr' => 'b3',
                'order' => 5,
                'intro' => 'این سطح پنجمین سطح آموزشی بنیاد سعدی است.',
                'low_color' => '80a0d3',
                'color' => '0065b3',
                'high_color' => '004c88',
            ],
            [
                'title' => 'پیشرفته',
                'title_abbr' => 'c1',
                'order' => 6,
                'intro' => 'این سطح ششمین سطح آموزشی بنیاد سعدی است.',
                'low_color' => 'c0e2ca',
                'color' => '00a650',
                'high_color' => '017337',
            ],
            [
                'title' => 'ماهر',
                'title_abbr' => 'c2',
                'order' => 7,
                'intro' => 'این سطح هفتمین سطح آموزشی بنیاد سعدی است.',
                'low_color' => 'bbafd5',
                'color' => '63409a',
                'high_color' => '422367',
            ],
        ];

        foreach ($levels_data as $level_data) {
            $level = new Level;
            $level->title = $level_data['title'];
            $level->title_abbr = $level_data['title_abbr'];
            $level->order = $level_data['order'];
            $level->intro = $level_data['intro'];
            $level->low_color = $level_data['low_color'];
            $level->color = $level_data['color'];
            $level->high_color = $level_data['high_color'];
            $level->save();
        }
    }
}
