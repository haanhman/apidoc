<?php

use Illuminate\Database\Seeder;

class FunctionSeeder extends Seeder
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
            $item = new \App\FunctionModel();
            $item->group_id = $this->faker->randomElement([1,2]);
            $item->end_point = $this->faker->word;
            $item->request_method = $this->faker->randomElement(['GET', 'POST', 'PUT', 'DELETE']);
            $item->description = $this->faker->sentence;
            $item->sample_data = 'sample - data';
            $item->created = time();
            $item->status = $this->faker->numberBetween(0,1);
            $item->save();
        }
    }
}
