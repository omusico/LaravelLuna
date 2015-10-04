<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Grade;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->delete();
        DB::table('lu_users')->delete();

//        User::create([
//        'id' => 1210311232,
//        'name' => '李锐',
//        'password' => Hash::make('1210311232')
//        ]);
//
//        User::create([
//        'id' => 1210311233,
//        'name' => '陈曦',
//        'password' => Hash::make('1210311233')
//        ]);
//
//        User::create([
//        'id' => 1234567890,
//        'name' => '管理员',
//        'password' => Hash::make('root'),
//        'is_admin' => 1
//        ]);
//
//        Grade::create([
//            'user_id' => 1210311232,
//            'math'    => 99,
//            'english'    => 80,
//            'c'    => 96,
//            'sport'    => 95,
//            'think'    => 99,
//            'soft'    => 98,
//            ]);
//
//        Grade::create([
//            'user_id' => 1210311233,
//            ]);

        \App\lu_user::create([
            'name' => 'admin',
            'password' => Hash::make('root'),
            'groupId' => 1,
            'is_admin' => 1,
            'invite'=>rand(10000,99999),
        ]);

        \App\lu_user_group::create([
            'name'=>'管理员',
            'intro'=>'管理员',
            'admin'=>1,
        ]);

        \App\lu_user_group::create([
            'name'=>'注册会员',
            'intro'=>'注册会员',
        ]);
        \App\lu_user_group::create([
            'name'=>'代理',
            'intro'=>'代理',
        ]);
        \App\lu_user_group::create([
            'name'=>'管理员',
            'intro'=>'管理员',
        ]);
        \App\lu_user_group::create([
            'name'=>'会员黑名单',
            'intro'=>'会员黑名单',
        ]);
        \App\lu_user_group::create([
            'name'=>'总代理',
            'intro'=>'总代理',
        ]);

        \App\lu_user_group::create([
            'name'=>'客服',
            'intro'=>'客服',
            'admin'=>1,
        ]);
    }

}
