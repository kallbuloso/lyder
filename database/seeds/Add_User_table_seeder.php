<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class Add_User_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        $user = new \App\Models\User();
        $date = Carbon::create(2018, 7, 18, 9);
        $faker =  Faker::create(app()->getLocale());
        $qntd = '30';
        
        $fn = $faker->firstName;
        $ln = $faker->lastName;
        $user->create([
            'first_name' => $fn,
            'last_name' => $ln,
            'name'      => $fn.' '.$ln,
            'nik_name'   => $faker->userName,
            'status' => '1',
            'email_verified_at' => $date,
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('123456'),
        ]);

        $fn = $faker->firstName;
        $ln = $faker->lastName;
        $user->create([
            'first_name' => $fn,
            'last_name' => $ln,
            'name'      => $fn.' '.$ln,
            'nik_name'   => $faker->userName,
            'status' => '1',
            'email_verified_at' => $date,
            'email'     => 'adm@adm.com',
            'password'  => bcrypt('123456'),
        ]);

    	// foreach (range(1,30) as $index) {
        // $populator = new Faker\ORM\Propel\Populator($faker);
        // $populator->addEntity('1');
        // $populator->addEntity('0');


        for ($i=1; $i <$qntd ; $i++) {
            //$tamps = Carbon::now()->subDays(100)->addDays($i);
            $tamps = $date->addDays($i);
            $fn = $faker->firstName;
            $ln = $faker->lastName;
            $user->create([
	            'first_name' => $fn,
                'last_name' => $ln,
                'name'      => $fn.' '.$ln,
                'nik_name'   => $faker->userName,
                'status' => $faker->boolean,
                'email_verified_at' => $tamps,
	            'email' => $faker->email,
                'password' => bcrypt('123456'),
                'created_at' => $tamps,
                'updated_at' => $tamps
            ]);
        }
    }
}