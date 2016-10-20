<?php

use Illuminate\Database\Seeder;

class GroupFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 2;
        for ($i = 0; $i < $limit; $i++) {
            $item = new \App\GroupFunctionModel();
            $item->project_id = 1;
            $item->name = $this->faker->word;
            $item->description = $this->faker->sentence;
            $item->created = time();
            $item->save();
        }
    }
}
