<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        $users = DB::table('users')->get();
        $names = array('客０','客１','客２','客３');
        $emails = array('e0','e1','e2','e3');

        foreach ($users as $user) {
            $name = $names[$i];
            $email = $emails[$i];
            DB::table('reviews')->insert([
                'review' => 5,
                'name' => $name,
                'mail' => $email,
                'gender' => 0,
                'age' => 3,
                'review' => 'とても美味しかったです！また行きたいと思います！',
                'opinion' => 5,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $i++;
        }
    }
}
