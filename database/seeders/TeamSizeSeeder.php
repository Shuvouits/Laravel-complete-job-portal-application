<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamSize;

class TeamSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamSize::insert([
            [
                'name' => 'only me',
                'slug' => 'only-me'
            ],

            [
                'name' => '5-10 members',
                'slug' => '5-10-members'
            ],

            [
                'name' => '15-30 members',
                'slug' => '15-30-members'
            ],

            [
                'name' => '25-30 members',
                'slug' => '25-30-members'
            ],

            [
                'name' => '45-50 members',
                'slug' => '45-50-members'
            ],



        ]);
    }
}
