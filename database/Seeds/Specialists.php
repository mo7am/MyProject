<?php

use Illuminate\Database\Seeder;
use App\Models\Specialist;
class Specialists extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new Specialist;
        $add1->specialist = "Manager";
        $add1->save();

        $add2 = new Specialist;
        $add2->specialist = "Receptionist";
        $add2->save();

        $add3 = new Specialist;
        $add3->specialist = "Acountant";
        $add3->save();

        $add4 = new Specialist;
        $add4->specialist = "Housekeaping";
        $add4->save();

        $add5 = new Specialist;
        $add5->specialist = "Cheif";
        $add5->save();
    }
}
