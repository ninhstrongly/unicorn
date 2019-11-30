<?php

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
        DB::table('users')->insert([
            ['name'=>'Unicorn','email'=>'admin@gmail.com','password'=>bcrypt('123456'),'address'=>'Thường tín'],
        ]);
    }
}
