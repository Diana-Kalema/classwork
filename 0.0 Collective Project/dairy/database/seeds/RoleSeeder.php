<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'Administrator',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //manager
        DB::table('roles')->insert([
            'name' => 'manager',
            'description' => 'Manager',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //user (casuals)
        DB::table('roles')->insert([
            'name' => 'user',
            'description' => 'User',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //cooperative-societies
        DB::table('roles')->insert([
            'name' => 'coop-soc',
            'description' => 'Cooperative Society',
            'isOrganization' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
