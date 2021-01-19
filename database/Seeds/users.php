<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new User;
        $add1->fname = "mohamed";
        $add1->mname = "salah";
        $add1->lname = "amein";
        $add1->balance = 20000.500;
        $add1->type_id = 1;
        $add1->stateBlock = 8;
        $add1->email = "mohamed@yahoo.com";
        $add1->password = bcrypt("123456");
        $add1->image = "user1-128x128.jpg";
        $add1->save();

        $add2 = new User;
        $add2->fname = "mohamed";
        $add2->mname = "Ahmed";
        $add2->lname = "radwan";
        $add2->balance = 2000.500;
        $add2->type_id = 2;
        $add2->stateBlock = 8;
        $add2->email = "radwan@yahoo.com";
        $add2->password = bcrypt("123456");
        $add2->image = "user2-160x160.jpg";
        $add2->save();

        $add3 = new User;
        $add3->fname = "mohamed";
        $add3->mname = "ramadan";
        $add3->lname = "bahr";
        $add3->balance = 10000.500;
        $add3->type_id = 3;
        $add3->stateBlock = 8;
        $add3->email = "ramadan@yahoo.com";
        $add3->password = bcrypt("123456");
        $add3->image = "user3-128x128.jpg";
        $add3->save();

        $add4 = new User;
        $add4->fname = "emad";
        $add4->mname = "sayed";
        $add4->lname = "aboelfadl";
        $add4->balance = 1000.500;
        $add4->type_id = 4;
        $add4->stateBlock = 8;
        $add4->email = "emad@yahoo.com";
        $add4->password = bcrypt("123456");
        $add4->image = "user4-128x128.jpg";
        $add4->save();

        $add5 = new User;
        $add5->fname = "omer";
        $add5->mname = "mohamed";
        $add5->lname = "elaiem";
        $add5->balance = 200.50;
        $add5->type_id = 5;
        $add5->stateBlock = 8;
        $add5->email = "omer@yahoo.com";
        $add5->password = bcrypt("123456");
        $add5->image = "user5-128x128.jpg";
        $add5->save();

        $add6 = new User;
        $add6->fname = "kareem";
        $add6->mname = "alaa";
        $add6->lname = "alaa";
        $add6->balance = 20000.500;
        $add6->type_id = 6;
        $add6->stateBlock = 8;
        $add6->email = "kareem@yahoo.com";
        $add6->password = bcrypt("123456");
        $add6->image = "user6-128x128.jpg";
        $add6->save();

        $add7 = new User;
        $add7->fname = "Abdelrahman";
        $add7->mname = "mohamed";
        $add7->lname = "boda";
        $add7->balance = 20000.500;
        $add7->type_id = 7;
        $add7->stateBlock = 8;
        $add7->email = "Abdelrahman@yahoo.com";
        $add7->password = bcrypt("123456");
        $add7->image = "user7-128x128.jpg";
        $add7->save();

        $add8 = new User;
        $add8->fname = "omer";
        $add8->mname = "mohamed";
        $add8->lname = "ahmed";
        $add8->balance = 500.50;
        $add8->type_id = 5;
        $add8->stateBlock = 8;
        $add8->email = "omermohamed@yahoo.com";
        $add8->password = bcrypt("123456");
        $add8->image = "user8-128x128.jpg";
        $add8->save();
    }
}
