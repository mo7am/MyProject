<?php

use Illuminate\Database\Seeder;
use App\Models\guist;
class guists extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new guist;
        $add1->checkindate = "2020-10-26 11:00:22";
        $add1->checkoutdate = "2020-10-28 11:00:22";
        $add1->city = "Cairo";
        $add1->nationality = "Egyptian";
        $add1->roomtype_id = 1;
        $add1->TypeOfRoomTypeID = 1;
        $add1->user_id = 6;
        $add1->save();

        $add2 = new guist;
        $add2->checkindate = "2020-10-26 11:00:22";
        $add2->checkoutdate = "2020-10-28 11:00:22";
        $add2->city = "America";
        $add2->nationality = "English";
        $add2->roomtype_id = 1;
        $add2->TypeOfRoomTypeID = 1;
        $add2->user_id = 7;
        $add2->save();
    }
}
