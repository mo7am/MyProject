<?php

use Illuminate\Database\Seeder;
use App\Models\usertype;

class usertypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new usertype;
        $add1->type = "Manager";
        $add1->save();

        $add2 = new usertype;
        $add2->type = "Receptionist";
        $add2->save();

        $add3 = new usertype;
        $add3->type = "Acountant";
        $add3->save();

        $add4 = new usertype;
        $add4->type = "Housekeaping";
        $add4->save();

        $add5 = new usertype;
        $add5->type = "Cheif";
        $add5->save();

        $add6 = new usertype;
        $add6->type = "localguest";
        $add6->save();

        $add7 = new usertype;
        $add7->type = "foreignguist";
        $add7->save();
    }
}
