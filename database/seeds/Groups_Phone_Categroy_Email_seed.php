<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class Groups_Phone_Categroy_Email_seed extends Seeder
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
        DB::table('groups')->truncate();
        DB::table('categories')->truncate();
        DB::table('emails')->truncate();
        DB::table('phones')->truncate();
        DB::table('roles')->truncate();

        $fake =Faker::create();
        $groups=[
            ['id'=>1, 'name'=>'Family', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>2, 'name'=>'Friends', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>3, 'name'=>'Clients', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
        ];
        $categories=[
            ['id'=>1, 'name'=>'Home', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>2, 'name'=>'Mobile', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>3, 'name'=>'Work', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
        ];
        $roles=[
            ['id'=>1, 'name'=>'admin', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>2, 'name'=>'author', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>3, 'name'=>'subscriber', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
        ];
        $emails=[
            ['id'=>1, 'email'=>'Home@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>2, 'email'=>'Home1@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>3, 'email'=>'Home2@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>4, 'email'=>'Home3@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>5, 'email'=>'Home4@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>6, 'email'=>'Home5@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>7, 'email'=>'Home6@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>8, 'email'=>'Home7@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>9, 'email'=>'Home8@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>10, 'email'=>'Home9@g.com', 'contact_id'=>rand(1,10), 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],

        ];
        $phones=[
            ['id'=>1, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>2, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>3, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>4, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>5, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>6, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>7, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>8, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>9, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],
            ['id'=>10, 'phone'=>'123', 'contact_id'=>rand(1,10), 'category_id'=>'1', 'created_at'=>new DateTime(), 'updated_at'=>new DateTime()],

        ];
        DB::table('groups')->insert($groups);
        DB::table('categories')->insert($categories);
        DB::table('emails')->insert($emails);
        DB::table('phones')->insert($phones);
        DB::table('roles')->insert($roles);

    }
}
