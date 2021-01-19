<?php

use Illuminate\Database\Seeder;
use App\Models\model_has_role;

class model_has_rolesDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new model_has_role;
        $add1->role_id = 1;
        $add1->model_type = "App\Models\User";
        $add1->model_id = 1;
        $add1->save();

        $add2 = new model_has_role;
        $add2->role_id = 2;
        $add2->model_type = "App\Models\User";
        $add2->model_id = 2;
        $add2->save();

        $add3 = new model_has_role;
        $add3->role_id = 3;
        $add3->model_type = "App\Models\User";
        $add3->model_id = 3;
        $add3->save();

        $add4 = new model_has_role;
        $add4->role_id = 4;
        $add4->model_type = "App\Models\User";
        $add4->model_id = 4;
        $add4->save();

        $add5 = new model_has_role;
        $add5->role_id = 5;
        $add5->model_type = "App\Models\User";
        $add5->model_id = 5;
        $add5->save();

        $add6 = new model_has_role;
        $add6->role_id = 6;
        $add6->model_type = "App\Models\User";
        $add6->model_id = 6;
        $add6->save();

        $add7 = new model_has_role;
        $add7->role_id = 7;
        $add7->model_type = "App\Models\User";
        $add7->model_id = 7;
        $add7->save();

        $add8 = new model_has_role;
        $add8->role_id = 5;
        $add8->model_type = "App\Models\User";
        $add8->model_id = 8;
        $add8->save();
    }
}
