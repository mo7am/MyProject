<?php

use Illuminate\Database\Seeder;
use App\Models\state;
class states extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new state;
        $add1->state = "Empty";
        $add1->save();

        $add2 = new state;
        $add2->state = "Full";
        $add2->save();

        $add3 = new state;
        $add3->state = "Seen";
        $add3->save();

        $add4 = new state;
        $add4->state = "Not Seen";
        $add4->save();

        $add5 = new state;
        $add5->state = "Clean";
        $add5->save();

        $add6 = new state;
        $add6->state = "Unclean";
        $add6->save();

        $add7 = new state;
        $add7->state = "Block";
        $add7->save();

        $add8 = new state;
        $add8->state = "Unblock";
        $add8->save();
    }
}
