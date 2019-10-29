<?php

use Illuminate\Database\Seeder;

use App\compTb;

class compTbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comp_tb = new compTb();
        $comp_tb->compname = "EAFW";
        $comp_tb->save();

        $comp_tb = new compTb();
        $comp_tb->compname = "ASC";
        $comp_tb->save();
    }
}
