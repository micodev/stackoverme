<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Tags_generator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = [["JavaScript", "devicon-javascript-plain"], ["Csharp", "devicon-csharp-plain colored"], ["Php", "devicon-php-plain colored"]];
        DB::table('tags')->truncate();
        foreach ($tag as $value) {
            DB::table('tags')->insert([
                'name' => $value[0],
                'Icon' => $value[1]
            ]);
        }

        DB::table('keywords')->truncate();
        $keyword = ["loop", "condition", "variable", "how to", "idea", "problem", "module"];
        foreach ($keyword as $value) {
            DB::table('keywords')->insert([
                'key' => $value,
            ]);
        }
        DB::table('users')->truncate();
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->firstNameMale . "_" . $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('1999126'),
            ]);
        }
    }
}