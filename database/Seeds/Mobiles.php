<?php

use Illuminate\Database\Seeder;
use App\Models\Mobile;
class Mobiles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new Mobile;
        $add1->code = "002";
        $add1->mobile = "01006977751";
        $add1->IdStaff = 5;
        $add1->save();

        $add2 = new Mobile;
        $add2->code = "002";
        $add2->mobile = "01006988851";
        $add2->IdStaff = 4;
        $add2->save();
    }
}
