<?php

use Illuminate\Database\Seeder;
use App\Models\Services;
class Service extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new Services;
        $add1->name = "Serve";
        $add1->save();

        $add2 = new Services;
        $add2->name = "Regist";
        $add2->save();

        $add3 = new Services;
        $add3->name = "Clean";
        $add3->save();

        $add4 = new Services;
        $add4->name = "Washing";
        $add4->save();

        $add5 = new Services;
        $add5->name = "Cooking";
        $add5->save();
    }
}
