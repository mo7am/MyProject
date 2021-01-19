<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new Post;
        $add1->content = "Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for ";
        $add1->image = "img-1.jpg";
        $add1->owner_id = 1;
        $add1->save();

        $add2 = new Post;
        $add2->content = "Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for ";
        $add2->image = "img-1.jpg";
        $add2->owner_id = 1;
        $add2->save();

        $add3 = new Post;
        $add3->content = "Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for ";
        $add3->image = "img-1.jpg";
        $add3->owner_id = 2;
        $add3->save();

        $add4 = new Post;
        $add4->content = "Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for ";
        $add4->image = "img-1.jpg";
        $add4->owner_id = 3;
        $add4->save();

        $add5 = new Post;
        $add5->content = "Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for ";
        $add5->image = "img-1.jpg";
        $add5->owner_id = 4;
        $add5->save();

        $add6 = new Post;
        $add6->content = "Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for ";
        $add6->image = "img-1.jpg";
        $add6->owner_id = 5;
        $add6->save();
    }
}
