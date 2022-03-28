<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        $status = 3;
        $names = array('太郎','ムバッペ','キャサリン','ミッキー');
        $emails = array('a1','a2','a3','a4');
        $passwords = array('password0','password1','password2','password3');

        foreach ($names as $name) {
            $email = $emails[$i];
            $password = $passwords[$i];
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'status' => $status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $i++;
            $status++;
        }
    }
}
