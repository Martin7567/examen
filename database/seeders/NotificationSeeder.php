<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notifications')->insert([
            'user_id' => 1,
            'title' => 'Lorem ipsum',
            'message' => 'Test Message 1',
            'read' => false,
        ]);

        DB::table('notifications')->insert([
            'user_id' => 1,
            'title' => 'Lorem ipsum',
            'message' => 'Test Message 2',
            'read' => true,
        ]);

        DB::table('notifications')->insert([
            'user_id' => 1,
            'title' => 'Lorem ipsum',
            'message' => 'Test Message 3',
            'read' => true,
        ]);

        DB::table('notifications')->insert([
            'user_id' => 1,
            'title' => 'Lorem ipsum',
            'message' => 'Test Message 4',
            'read' => false,
        ]);

        DB::table('notifications')->insert([
            'user_id' => 2,
            'title' => 'Lorem ipsum',
            'message' => 'Dit zou je niet mogen zien',
            'read' => false,
        ]);
    }
}
