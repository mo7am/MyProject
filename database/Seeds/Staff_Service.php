<?php

use Illuminate\Database\Seeder;
use App\Models\staff_services;
class Staff_Service extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new staff_services;
        $add1->staff_Id = 2;
        $add1->service_Id = 1;
        $add1->save();

        $add2 = new staff_services;
        $add2->staff_Id = 2;
        $add2->service_Id = 2;
        $add2->save();

        $add3 = new staff_services;
        $add3->staff_Id = 5;
        $add3->service_Id = 3;
        $add3->save();

        $add4 = new staff_services;
        $add4->staff_Id = 5;
        $add4->service_Id = 4;
        $add4->save();

        $add5 = new staff_services;
        $add5->staff_Id = 5;
        $add5->service_Id = 5;
        $add5->save();

        $add6 = new staff_services;
        $add6->staff_Id = 6;
        $add6->service_Id = 3;
        $add6->save();

        $add7 = new staff_services;
        $add7->staff_Id = 6;
        $add7->service_Id = 4;
        $add7->save();

        $add8 = new staff_services;
        $add8->staff_Id = 6;
        $add8->service_Id = 5;
        $add8->save();
    }
}
