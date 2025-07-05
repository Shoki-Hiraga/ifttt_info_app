<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $types = [
            ['key' => 'seo_news',         'label' => 'SEOニュース'],
            ['key' => 'core_update',      'label' => 'コアアップデート'],
            ['key' => 'seo_tsuj',         'label' => '辻正浩 SEO'],
            ['key' => 'seo_watanabe',     'label' => '渡辺隆広 SEO'],
            ['key' => 'seo_suzuki',       'label' => '鈴木謙一 SEO'],
            ['key' => 'seo_kimura',       'label' => '木村賢 SEO'],
            ['key' => 'seo_kashiwazaki',  'label' => '柏崎剛 SEO'],
            ['key' => 'seo_otaku',        'label' => 'LANY SEO'],
            ['key' => 'seo_Mieruka',      'label' => 'Mieruka SEO'],
            ['key' => 'ai_shift',         'label' => 'SHIFT AI'],
            ['key' => 'ai_aruru',         'label' => 'SHIFあるる ChatGPT'],
            ['key' => 'ai_chaen',         'label' => 'チャエン デジライズ'],
        ];

        foreach ($types as &$type) {
            $type['created_at'] = $now;
            $type['updated_at'] = $now;
        }

        DB::table('types')->insert($types);
    }
}
