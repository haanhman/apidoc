<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
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
            $item = new \App\ProjectModel();
            $item->name = $this->faker->name;
            $item->description = $this->faker->sentence;
            $item->status = 1;
            $item->created = time();
            $item->save();
        }
    }
}
