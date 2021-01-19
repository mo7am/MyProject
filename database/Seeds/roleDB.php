<?php

use Illuminate\Database\Seeder;
use App\Models\role;

class roleDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new role;
        $add1->name = "Manager";
        $add1->guard_name = "web";
        $add1->save();

        $add2 = new role;
        $add2->name = "Receptionist";
        $add2->guard_name = "web";
        $add2->save();

        $add3 = new role;
        $add3->name = "Acountant";
        $add3->guard_name = "web";
        $add3->save();

        $add4 = new role;
        $add4->name = "Housekeaping";
        $add4->guard_name = "web";
        $add4->save();

        $add5 = new role;
        $add5->name = "Cheif";
        $add5->guard_name = "web";
        $add5->save();

        $add6 = new role;
        $add6->name = "localguest";
        $add6->guard_name = "web";
        $add6->save();

        $add7 = new role;
        $add7->name = "foreignguist";
        $add7->guard_name = "web";
        $add7->save();
    }
}
