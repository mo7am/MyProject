<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;
class CommentDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = new Comment;
        $add1->content = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $add1->owner_id = 2;
        $add1->post_id = 1;
        $add1->save();

        $add2 = new Comment;
        $add2->content = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $add2->owner_id = 1;
        $add2->post_id = 2;
        $add2->save();

        $add3 = new Comment;
        $add3->content = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $add3->owner_id = 3;
        $add3->post_id = 2;
        $add3->save();

        $add4 = new Comment;
        $add4->content = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $add4->owner_id = 4;
        $add4->post_id = 3;
        $add4->save();

        $add5 = new Comment;
        $add5->content = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $add5->owner_id = 5;
        $add5->post_id = 4;
        $add5->save();

        $add6 = new Comment;
        $add6->content = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $add6->owner_id = 1;
        $add6->post_id = 5;
        $add6->save();
    }
}
