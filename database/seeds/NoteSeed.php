<?php

use Illuminate\Database\Seeder;

class NoteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Note::class, 50)->create();
    }
}
