<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class Contacts_Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('users')->truncate();

        $users=[];
        for ($i=1; $i<=3; $i++){
            $users[]=[
                'name'=>"User {$i}",
                'email'=>"user{$i}@g.com",
                'role_id'=>rand(1,3),
                'password'=>bcrypt('secret')
            ];
        }
        DB::table('users')->insert($users);

        DB::table('contacts')->truncate();

        $faker = Faker::create();

        $contacts = [];

        foreach (range(1, 10) as $index) {
            $contacts[] = [
                'fname' => $faker->firstName,
                'lname'=>$faker->lastName,
                'group_id'=>$faker->numberBetween(1,3),

                'user_id'=>rand(1,3),
                'path'=>"/",
                'address' => "{$faker->streetAddress} {$faker->postcode} {$faker->city} {$faker->country}",
                'company' => $faker->company,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
        }

        DB::table('contacts')->insert($contacts);
    }
}
