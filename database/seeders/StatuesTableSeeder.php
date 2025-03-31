<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Statue;


class StatuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statue::create(['status' => 'public']);
        Statue::create(['status' => 'private']);
        Statue::create(['status' => 'public']);
    }
}
