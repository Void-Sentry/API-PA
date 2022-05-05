<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'dev'
        ]);

        DB::table('roles')->insert([
            'name' => 'diretor'
        ]);

        DB::table('roles')->insert([
            'name' => 'editor'
        ]);

        DB::table('roles')->insert([
            'name' => 'reporter'
        ]);
    }
}