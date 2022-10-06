<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Ram', 'Shayam', 'Raju', 'Dhruv', 'Zara', 'Taylor', 'Shawn', 'Justin', 'EdShreen', 'Zayon', 'Rexa', 'Disha'];
        foreach ($arr as $key => $value) {
            Template::create([
                'name' => $value,
                'description' => 'Indian'
            ]);
        }
    }
}
