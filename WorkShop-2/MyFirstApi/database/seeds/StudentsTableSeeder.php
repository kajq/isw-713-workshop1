<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        $faker = \Faker\Factory::create();

        User::create([
            'firstname' => 'test_name',
            'lastname' => 'lastname_test',
            'email' => 'test@gmail.com',
            'address' => 'address_test',
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'firstname' => $faker->firstname,
                'lastname' => $faker->lastname,
                'email' => $email,
                'address' => $address,
            ]);
        }
    }
}
