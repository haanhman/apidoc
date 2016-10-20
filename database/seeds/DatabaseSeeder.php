<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProjectSeeder::class);
//        $this->call(GroupFunctionSeeder::class);
//        $this->call(FunctionSeeder::class);
//        $this->call(ArgumentSeeder::class);
//        $this->call(ReturnValueSeeder::class);
    }
}
