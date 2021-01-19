<?php

use Illuminate\Database\Seeder;
use App\Models\role_has_permission;

class rolehaspermissionDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new role_has_permission;
        $add1->role_id = 1;
        $add1->permission_id = 1;
        $add1->save();

        $add2 = new role_has_permission;
        $add2->role_id = 2;
        $add2->permission_id = 2;
        $add2->save();

        $add3 = new role_has_permission;
        $add3->role_id = 3;
        $add3->permission_id = 3;
        $add3->save();

        $add4 = new role_has_permission;
        $add4->role_id = 4;
        $add4->permission_id = 4;
        $add4->save();

        $add5 = new role_has_permission;
        $add5->role_id = 5;
        $add5->permission_id = 5;
        $add5->save();

        $add6 = new role_has_permission;
        $add6->role_id = 6;
        $add6->permission_id = 6;
        $add6->save();

        $add7 = new role_has_permission;
        $add7->role_id = 7;
        $add7->permission_id = 7;
        $add7->save();
    }
}
