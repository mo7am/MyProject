<?php

use Illuminate\Database\Seeder;
use App\Models\staff;
class staffDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new staff;
        $add1->birthdate = "1973-1-1";
        $add1->workhours = 6;
        $add1->salary = 20000.500;
        $add1->age = 46;
        $add1->phone = "01006977751";
        $add1->Address = "Cairo";
        $add1->user_id = 1;
        $add1->specialist_Id = 1;
        $add1->save();

        $add2 = new staff;
        $add2->birthdate = "1985-6-30";
        $add2->workhours = 6;
        $add2->salary = 7000.500;
        $add2->age = 35;
        $add2->phone = "01006977751";
        $add2->Address = "Cairo";
        $add2->user_id = 2;
        $add2->specialist_Id = 1;
        $add2->save();

        $add3 = new staff;
        $add3->birthdate = "1981-10-4";
        $add3->workhours = 6;
        $add3->salary = 5000.500;
        $add3->age = 39;
        $add3->phone = "01006977751";
        $add3->Address = "Cairo";
        $add3->user_id = 3;
        $add3->specialist_Id = 2;
        $add3->save();

        $add4 = new staff;
        $add4->birthdate = "1990-11-8";
        $add4->workhours = 6;
        $add4->salary = 6000.500;
        $add4->age = 30;
        $add4->phone = "01006977751";
        $add4->Address = "Cairo";
        $add4->user_id = 4;
        $add4->specialist_Id = 2;
        $add4->save();

        $add5 = new staff;
        $add5->birthdate = "1991-7-2";
        $add5->workhours = 6;
        $add5->salary = 5000.500;
        $add5->age = 31;
        $add5->phone = "01006977751";
        $add5->Address = "England";
        $add5->user_id = 5;
        $add5->specialist_Id = 3;
        $add5->save();

        $add6 = new staff;
        $add6->birthdate = "1991-7-2";
        $add6->workhours = 6;
        $add6->salary = 500.500;
        $add6->age = 31;
        $add6->phone = "01006977751";
        $add6->Address = "Egypt";
        $add6->user_id = 8;
        $add6->specialist_Id = 5;
        $add6->save();
    }
}
