<?php

use Illuminate\Database\Seeder;

class ArgumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 5;
        for ($i = 0; $i < $limit; $i++) {
            $item = new \App\ArgumentModel();
            $item->function_id = $this->faker->numberBetween(1,5);
            $item->name = $this->faker->word;
            $item->data_type = $this->faker->randomElement(['int', 'float', 'double', 'string', 'array']);
            $item->is_requered = $this->faker->numberBetween(0,1);
            $item->description = $this->faker->sentence;
            $item->weight = $i+1;
            $item->created = time();
            $item->save();
        }
    }
}
