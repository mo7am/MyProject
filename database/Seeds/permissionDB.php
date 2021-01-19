<?php

use Illuminate\Database\Seeder;
use App\Models\permission;

class permissionDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new permission;
        $add1->name = "ManagerOperations";
        $add1->guard_name = "web";
        $add1->save();

        $add2 = new permission;
        $add2->name = "ReceptionistOperations";
        $add2->guard_name = "web";
        $add2->save();

        $add3 = new permission;
        $add3->name = "AccountantOperations";
        $add3->guard_name = "web";
        $add3->save();

        $add4 = new permission;
        $add4->name = "HouseKeepingOperations";
        $add4->guard_name = "web";
        $add4->save();

        $add5 = new permission;
        $add5->name = "ChiefOperations";
        $add5->guard_name = "web";
        $add5->save();

        $add6 = new permission;
        $add6->name = "LocalguestOperations";
        $add6->guard_name = "web";
        $add6->save();

        $add7 = new permission;
        $add7->name = "ForeignguestOperations";
        $add7->guard_name = "web";
        $add7->save();
    }
}
