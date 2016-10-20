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
        $limit = 1;
        for ($i = 0; $i < $limit; $i++) {
            $item = new \App\ProjectModel();
            $item->name = 'Time maganement system';
            $item->description = 'Time maganement system api server';
            $item->status = 1;
            $item->created = time();
            $item->save();
        }
    }
}
