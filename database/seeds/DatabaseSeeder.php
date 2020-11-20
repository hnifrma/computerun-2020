<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            [
                'name'=>'Hanif Rama Zhaky',
                'email'=>'hnifrma@gmail.com',
                'university_id'=>1,
                'role_id'=>2,
                'nim'=>'2201783583',
                'password'=>'x'
            ],
            [
                'name'=>'Putra',
                'email'=>'putra@gmail.com',
                'university_id'=>1,
                'role_id'=>1,
                'nim'=>'2201783581',
                'password'=>'x'
            ],
            [
                'name'=>'Maso',
                'email'=>'maso@gmail.com',
                'university_id'=>1,
                'role_id'=>1,
                'nim'=>'2201783585',
                'password'=>'x'
            ]
        ]);

        DB::table('teams')->insert([
            [
                'team_name'=>'Ikan hiu'
            ]
        ]);

        DB::table('team_details')->insert([
            [
                'user_id'=>1,
                'team_id'=>1,
                'team_detail_role'=>'Leader'
            ],
            [
                'user_id'=>2,
                'team_id'=>1,
                'team_detail_role'=>'Member'
            ],
            [
                'user_id'=>3,
                'team_id'=>1,
                'team_detail_role'=>'Member'
            ]
        ]);
    }
}
