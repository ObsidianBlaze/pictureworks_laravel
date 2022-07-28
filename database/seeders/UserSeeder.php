<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Making the seeders.
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => "David",
            'comment' => "Director"
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => "Samuel",
            'comment' => "Photographer"
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => "Stanley",
            'comment' => "Inspector"
        ]);

    }
}
