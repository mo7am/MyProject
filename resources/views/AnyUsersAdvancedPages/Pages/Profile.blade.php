@extends('anyUsersAdvancedPages.layouts.content')

@section('contentAnyUsersAdvancedPages')




    <section class="content-header">
        <div class="col-md-12" >
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
               <br>
                <div class=" box" >

                <img class=" box" id="imagePreviewCover" class="col-md-12" style="height: 390px  " src="{{URL::asset('images/users/photo1.png')}}" alt="User Avatar">

                    <label class="btn btn-default" >
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        Photo/Video <input name="profileImage" accept="image/jpeg , image/png " onchange="ShowImagePreview(this, document.getElementById('imagePreviewCover'))" type="file" style="display: none !important;">
                    </label>

                </div>
                <div class=" widget-user-image">
                    <img  id="imagePreviewProfile" style="margin-left: -30px; margin-top: 280px ; width: 150px ;height: 150px" class="img-circle" src="{{URL::asset('images/users/'.auth()->user()->image)}}" alt="User Avatar">
                    <label class="btn btn-default" style="margin-top: 410px ;margin-left: -93px">
                        <i class="fa fa-picture-o" aria-hidden="true" ></i>
                         <input data-toggle="modal" data-target="#modal-default"   type="button" style="display: none !important;">
                    </label>


                </div>
                <div class="box-footer">
                    <div class="row">


                        <!-- /.col -->
                        <div class="col-sm-12 " >
                            <h3 class=" text-center">
                                <span id="fnameuserforpage">{{auth()->user()->fname}} </span>
                                <span id="mnameuserforpage" >{{auth()->user()->mname}} </span>
                            </h3>
                            <p class="text-muted text-center">
                                @if(auth()->user()->type_id == 1 )
                                    {{__('pageContent.navbar_manager')}}
                                @elseif(auth()->user()->type_id == 2)
                                    {{__('pageContent.navbar_receptionist')}}
                                @elseif(auth()->user()->type_id == 3)
                                    {{__('pageContent.navbar_acountant')}}
                                @elseif(auth()->user()->type_id == 4)
                                    {{__('pageContent.navbar_housekeeping')}}
                                @elseif(auth()->user()->type_id == 5)
                                    {{__('pageContent.navbar_chief')}}
                                @elseif(auth()->user()->type_id == 6)
                                    {{__('pageContent.navbar_localguest')}}
                                @elseif(auth()->user()->type_id == 7)
                                    {{__('pageContent.navbar_foreignguist')}}
                                @endif
                            </p>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>

    <!-- Main content -->
    <section class="content">

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Image Profile</h4>
                    </div>

                    <form method="post" enctype="multipart/form-data"  id="UpdateImageProfile">
                        {{ csrf_field() }}
                    <img id="imagePreviewProfileImage" style="margin-left: 210px;  width: 150px ;height: 150px" class="img-circle" src="{{URL::asset('images/users/'.auth()->user()->image)}}" alt="User Avatar">
                    <label class="btn btn-default" style="margin-top: 200px ;margin-left: -135px">
                        <i class="fa fa-picture-o" aria-hidden="true" ></i>
                        Photo/Video <input  name="profileImage" accept="image/jpeg , image/png " onchange="ShowImagePreview(this, document.getElementById('imagePreviewProfileImage')) ; " type="file" style="display: none !important;">
                    </label>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        Intro

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b> Working Here </b> <a class="pull-right"> @if(auth()->user()->type_id == 1 )
                                        {{__('pageContent.navbar_manager')}}
                                    @elseif(auth()->user()->type_id == 2)
                                        {{__('pageContent.navbar_receptionist')}}
                                    @elseif(auth()->user()->type_id == 3)
                                        {{__('pageContent.navbar_acountant')}}
                                    @elseif(auth()->user()->type_id == 4)
                                        {{__('pageContent.navbar_housekeeping')}}
                                    @elseif(auth()->user()->type_id == 5)
                                        {{__('pageContent.navbar_chief')}}
                                    @elseif(auth()->user()->type_id == 6)
                                        {{__('pageContent.navbar_localguest')}}
                                    @elseif(auth()->user()->type_id == 7)
                                        {{__('pageContent.navbar_foreignguist')}}
                                    @endif</a>
                            </li>
                            @if(auth()->user()->type_id == 1 || auth()->user()->type_id == 2 ||auth()->user()->type_id == 3 ||auth()->user()->type_id == 4 ||auth()->user()->type_id == 5)
                            <li class="list-group-item">
                                <b>Lives in </b> <a class="pull-right">{{$allusers->Address}}</a>
                            </li>
                            @endif
                            @if(auth()->user()->type_id == 1 || auth()->user()->type_id == 2 ||auth()->user()->type_id == 3 ||auth()->user()->type_id == 4 ||auth()->user()->type_id == 5)

                            <li class="list-group-item">
                                <b>From </b> <a class="pull-right">{{$allusers->Address}}</a>
                            </li>
                            @endif
                        </ul>

                        <a  id="datetime"  class="btn btn-primary btn-block tab-pane"><b>Edit Details</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                        <li><a href="#ChangePassword" data-toggle="tab">Change Password</a></li>
                    <!-- <li><a href="#ChangeProfilePicture" data-toggle="tab">Change Profile Picture</a></li> -->
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#allPosts" data-toggle="tab">All Posts</a></li>
                                <li><a href="#myPosts" data-toggle="tab">My Posts</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="allPosts">

                                    @foreach($posts as $post)
<div id="allpost">
                                        <div class="row" id="postings">
                                            <div class="col-md-12">
                                                <!-- Box Comment -->
                                                <div class="box box-widget">
                                                    <div class="box-header with-border">
                                                        <div class="user-block">

                                                            @if($post->user->id == auth()->user()->id)
                                                                <img id="allpost" class="img-circle allpost" src="{{URL::asset('images/users/'.$post->user->image)}}" alt="User Image">

                                                            @else
                                                                <img id="allpost" class="img-circle " src="{{URL::asset('images/users/'.$post->user->image)}}" alt="User Image">

                                                            @endif

                                                            <span class="username"><a href="{{ url('profile/'.$post->user->id ) }}">{{$post->user->fname}} {{$post->user->mname}}</a></span>
                                                            <?php

                                                            $month =  $post->created_at->format('m');
                                                            $years =  $post->created_at->format('Y');
                                                            $day =  $post->created_at->format('d');

                                                            $date = \Carbon\Carbon::now()->toDateTimeString();
                                                            $carbon_date = \Carbon\Carbon::parse($date);
                                                            $new = $carbon_date->addHours(2);

                                                            $currentTime = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date);
                                                            $timeDatabase = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $post->created_at);

                                                            $difference = $timeDatabase->diff($currentTime);

                                                            /*$totalDuration = $currentTime->diffForHumans($timeDatabase);
                                                            $diff_in_days = $currentTime->diffInDays($timeDatabase);
                                                            $diff_in_months = $currentTime->diffInMonths($timeDatabase);
                                                            $diff_in_years = $currentTime->diffInYears($timeDatabase);
                                                            $diff_in_hours = $currentTime->diffInHours($timeDatabase);
                                                            $diff_in_minutes = $currentTime->diffInMinutes($timeDatabase);
                                                            $diff_in_seconds = $currentTime->diffInSeconds($timeDatabase);*/

                                                            $currentDateTime = $post->created_at;
                                                            $timeAMOrPM = date('h:i A', strtotime($currentDateTime));
                                                            ?>

                                                            @if($difference->s == 0 && $difference->h ==0 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                                                                <span > Since {{$difference->s }} min </span>
                                                                @elseif( $difference->s < 60 && $difference->h ==0 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                                                                    <span class="description"> Since {{$difference->s }} min</span>

                                                                @elseif( $difference->h < 24 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                                                                <span class="description"> Since {{$difference->h}}h</span>

                                                            @elseif($difference->days == 1 && $difference->m == 0 &&$difference->y ==0 )
                                                                <span class="description"> Since Yesterday</span>
                                                            @elseif($month == 1)
                                                                    <span class="description"> Since {{$day}} Jan. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 2)
                                                                    <span class="description"> Since {{$day}} Feb. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 3)
                                                                    <span class="description"> Since {{$day}} Mar. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 4)
                                                                    <span class="description"> Since {{$day}} Apr. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 5)
                                                                    <span class="description"> Since {{$day}} May. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 6)
                                                                    <span class="description"> Since {{$day}} June. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 7)
                                                                    <span class="description"> Since {{$day}} July. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 8)
                                                                    <span class="description"> Since {{$day}} Aug. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 9)
                                                                    <span class="description"> Since {{$day}} sept. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 10)
                                                                    <span class="description"> Since {{$day}} Oct. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 11)
                                                                    <span class="description"> Since {{$day}} Nov. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 12)
                                                                    <span class="description"> Since {{$day}} Dec. {{$years}} at {{$timeAMOrPM}}</span>

                                                                @endif




                                                        </div>
                                                        <!-- /.user-block -->
                                                        <div class="box-tools">
                                                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                                                                <i class="fa fa-circle-o"></i></button>
                                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                        </div>
                                                        <!-- /.box-tools -->
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        @if($post->image != null)
                                                        <img class="img-responsive pad" src="{{URL::asset('images/users/'.$post->image)}}" alt="Photo">

                                                        @endif

                                                        <p>{{$post->content}}</p>
                                                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                                                        <span class="pull-right text-muted">0 likes - 0 comments</span>
                                                    </div>


                                                @if (count($post->comments))
                                                    @foreach($post->comments as $comment)
                                                        <!-- /.box-body -->
                                                            <div class="box-footer box-comments">
                                                                <div class="box-comment">
                                                                    <!-- User image -->
                                                                    @if($comment->user->id == auth()->user()->id)
                                                                        <img id="allcomment" class="img-circle img-sm allcomment" src="{{URL::asset('images/users/'.$comment->user->image)}}" alt="User Image">

                                                                    @else
                                                                        <img id="allcomment" class="img-circle img-sm " src="{{URL::asset('images/users/'.$comment->user->image)}}" alt="User Image">

                                                                    @endif

                                                                    <div class="comment-text">

                                            <span class="username"><a href="{{ url('profile/'.$comment->user->id ) }}"> {{$comment->user->fname}} {{$comment->user->mname}}</a>



                          <?php

                          $month =  $comment->created_at->format('m');
                          $years =  $comment->created_at->format('Y');
                          $day =  $comment->created_at->format('d');

                          $date = \Carbon\Carbon::now()->toDateTimeString();
                          $carbon_date = \Carbon\Carbon::parse($date);
                          $new = $carbon_date->addHours(2);

                          $currentTime = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date);
                          $timeDatabase = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $comment->created_at);

                          $difference = $timeDatabase->diff($currentTime);

                          $var = "Now";
                          /*$totalDuration = $currentTime->diffForHumans($timeDatabase);
                          $diff_in_days = $currentTime->diffInDays($timeDatabase);
                          $diff_in_months = $currentTime->diffInMonths($timeDatabase);
                          $diff_in_years = $currentTime->diffInYears($timeDatabase);
                          $diff_in_hours = $currentTime->diffInHours($timeDatabase);
                          $diff_in_minutes = $currentTime->diffInMinutes($timeDatabase);
                          $diff_in_seconds = $currentTime->diffInSeconds($timeDatabase);*/

                          $currentDateTime = $comment->created_at;
                          $timeAMOrPM = date('h:i A', strtotime($currentDateTime));
                          ?>
                                                @if($difference->s ==0  && $difference->h ==0 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                                                    <span >  {{$var }} </span>
                                                @elseif($difference->s < 60 && $difference->h ==0 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                              <span > Since {{$difference->s }} min </span>
                          @elseif( $difference->h < 24 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                              <span class="text-muted pull-right"> Since {{$difference->h}}h</span>

                          @elseif($difference->days == 1 && $difference->m == 0 &&$difference->y ==0 )
                              <span class="text-muted pull-right"> Since Yesterday</span>
                          @elseif($month == 1)
                                  <span class="text-muted pull-right"> Since {{$day}} Jan. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 2)
                                  <span class="text-muted pull-right"> Since {{$day}} Feb. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 3)
                                  <span class="text-muted pull-right"> Since {{$day}} Mar. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 4)
                                  <span class="text-muted pull-right"> Since {{$day}} Apr. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 5)
                                  <span class="text-muted pull-right"> Since {{$day}} May. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 6)
                                  <span class="text-muted pull-right"> Since {{$day}} June. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 7)
                                  <span class="text-muted pull-right"> Since {{$day}} July. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 8)
                                  <span class="text-muted pull-right"> Since {{$day}} Aug. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 9)
                                  <span class="text-muted pull-right"> Since {{$day}} sept. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 10)
                                  <span class="text-muted pull-right"> Since {{$day}} Oct. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 11)
                                  <span class="text-muted pull-right"> Since {{$day}} Nov. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 12)
                                  <span class="text-muted pull-right"> Since {{$day}} Dec. {{$years}} at {{$timeAMOrPM}}</span>

                              @endif





                      </span><!-- /.username -->
                                                                        {{$comment->content}}
                                                                    </div>
                                                                    <!-- /.comment-text -->
                                                                </div>

                                                            </div>
                                                        @endforeach

                                                    @endif

                                                    <div class="box-footer">
                                                        <form action="#" method="post">
                                                            <img  class="img-responsive img-circle img-sm allcomment2" src="{{URL::asset('images/users/'.auth()->user()->image)}}" alt="Alt Text">
                                                            <!-- .img-push is used to add margin to elements next to floating images -->

                                                            <div class="img-push ">
                                                                <input type="text" class=" col-md-10" placeholder="Press enter to post comment">
                                                                    <input data-toggle="modal" data-target="#modal-default"   type="button" style="display: none !important;">
                                                                </label>
                                                                <input  id='but_addComment' type="button" value="Add" class="btn btn-primary  ">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.box-footer -->
                                                </div>
                                                <!-- /.box -->
                                            </div>


                                        </div>







                                </div>

                                    @endforeach

                                    <form>

                                        <input style="visibility: hidden" type="text" value="{{$countAllRows}}" id="countAllRows">
                                        <div  class="form-group col-md-12" >
                                            <input  id='but_more' type="button" value="More" class="btn btn-primary  btn-block py-3 px-5 col-md-12">
                                        </div>
                                    </form>
                                </div>

                                <div class=" tab-pane" id="myPosts">

                                    <!-- general form elements -->
                                    <div  class="box box-primary" style=" background-color:#EAEDED; ">
                                        <div class="box-header with-border">

                                        </div>
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <form method="post"  enctype="multipart/form-data"  id="postData">
                                            {{ csrf_field() }}
                                            <div class="box-body">
                                                <div class="form-group">

                                                    <input name="postContent" type="text" class="form-control" id="exampleInputPost" placeholder="What's on your mind?">
                                                </div>
                                                <div style="overflow-x:hidden ; overflow-y:scroll; white-space: nowrap ; height: 350px;display:none" id="showScroll">
                                                <img class="box " src="" id="imagePreview" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="btn btn-default">
                                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                        Photo/Video <input class="form-control" name="image" accept="image/jpeg , image/png " onchange="ShowImagePreviewForPost(this, document.getElementById('imagePreview'))" type="file" style="display: none !important;">
                                                    </label>
                                                </div>

                                            </div>
                                            <!-- /.box-body -->

                                            <div class="box-footer">
                                                <input type="submit" id="Add_Post" class="btn btn-primary" value="Post">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.box -->

                                    <form style="display: none">
                                    <input id="imguser" type="text" value="{{auth()->user()->image}}"/>
                                    <input id="fnuser" type="text" value="{{auth()->user()->fname}}"/>
                                    <input id="mnuser" type="text" value="{{auth()->user()->mname}}"/>
                                    <input id="iduser" type="text" value="{{auth()->user()->id}}"/>
                                    </form>

                                    @foreach($myPosts as $myPost)

                                <div id="postreturndata">
                                        <div class="row" id="postings" >
                                            <div class="col-md-12">
                                                <!-- Box Comment -->
                                                <div class="box box-widget">
                                                    <div class="box-header with-border">
                                                        <div class="user-block">
                                                            <img id="mypost" class="img-circle mypost" src="{{URL::asset('images/users/'.$myPost->user->image)}}" alt="User Image">
                                                            <span class="username"><a href="{{ url('profile/'.$myPost->user->id ) }}">{{$myPost->user->fname}} {{$myPost->user->mname}}</a></span>
                                                            <?php

                                                            $month =  $myPost->created_at->format('m');
                                                            $years =  $myPost->created_at->format('Y');
                                                            $day =  $myPost->created_at->format('d');

                                                            $date = \Carbon\Carbon::now()->toDateTimeString();
                                                            $carbon_date = \Carbon\Carbon::parse($date);
                                                            $new = $carbon_date->addHours(2);

                                                            $currentTime = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date);
                                                            $timeDatabase = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $myPost->created_at);

                                                            $difference = $timeDatabase->diff($currentTime);

                                                            $var = "Now";
                                                            /*$totalDuration = $currentTime->diffForHumans($timeDatabase);
                                                            $diff_in_days = $currentTime->diffInDays($timeDatabase);
                                                            $diff_in_months = $currentTime->diffInMonths($timeDatabase);
                                                            $diff_in_years = $currentTime->diffInYears($timeDatabase);
                                                            $diff_in_hours = $currentTime->diffInHours($timeDatabase);
                                                            $diff_in_minutes = $currentTime->diffInMinutes($timeDatabase);
                                                            $diff_in_seconds = $currentTime->diffInSeconds($timeDatabase);*/

                                                            $currentDateTime = $myPost->created_at;
                                                            $timeAMOrPM = date('h:i A', strtotime($currentDateTime));
                                                            ?>
                                                            @if($difference->s ==0  && $difference->h ==0 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                                                                <span >  Now </span>
                                                            @elseif($difference->s < 60 && $difference->h ==0 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                                                                <span > Since {{$difference->s }} min </span>
                                                            @elseif( $difference->h < 24 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                                                                <span class="text-muted pull-right"> Since {{$difference->h}}h</span>

                                                            @elseif($difference->days == 1 && $difference->m == 0 &&$difference->y ==0 )
                                                                <span class="text-muted pull-right"> Since Yesterday</span>
                                                            @elseif($month == 1)
                                                                    <span class="description"> Since {{$day}} Jan. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 2)
                                                                    <span class="description"> Since {{$day}} Feb. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 3)
                                                                    <span class="description"> Since {{$day}} Mar. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 4)
                                                                    <span class="description"> Since {{$day}} Apr. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 5)
                                                                    <span class="description"> Since {{$day}} May. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 6)
                                                                    <span class="description"> Since {{$day}} June. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 7)
                                                                    <span class="description"> Since {{$day}} July. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 8)
                                                                    <span class="description"> Since {{$day}} Aug. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 9)
                                                                    <span class="description"> Since {{$day}} sept. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 10)
                                                                    <span class="description"> Since {{$day}} Oct. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 11)
                                                                    <span class="description"> Since {{$day}} Nov. {{$years}} at {{$timeAMOrPM}}</span>
                                                                @elseif($month == 12)
                                                                    <span class="description"> Since {{$day}} Dec. {{$years}} at {{$timeAMOrPM}}</span>

                                                                @endif




                                                        </div>
                                                        <!-- /.user-block -->
                                                        <div class="box-tools">
                                                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                                                                <i class="fa fa-circle-o"></i></button>
                                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                        </div>
                                                        <!-- /.box-tools -->
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        @if($myPost->image != null)
                                                            <img class="img-responsive pad" src="{{URL::asset('images/users/'.$myPost->image)}}" alt="Photo">

                                                        @endif


                                                        <p >{{$myPost->content}}</p>
                                                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                                                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                                                        <span class="pull-right text-muted">0 likes - 0 comments</span>
                                                    </div>


                                                @if (count($myPost->comments))
                                                    @foreach($myPost->comments as $myComment)
                                                        <!-- /.box-body -->
                                                            <div class="box-footer box-comments">
                                                                <div class="box-comment">
                                                                    <!-- User image -->
                                                                    @if($myComment->user->id == auth()->user()->id)
                                                                    <img class="img-circle img-sm mycomment" src="{{URL::asset('images/users/'.$myComment->user->image)}}" alt="User Image">

                                                                    @else
                                                                        <img class="img-circle img-sm " src="{{URL::asset('images/users/'.$myComment->user->image)}}" alt="User Image">

                                                                    @endif
                                                                        <div class="comment-text">
                      <span class="username">
                        {{$myComment->user->fname}} {{$myComment->user->mname}}
                          <?php

                          $month =  $myComment->created_at->format('m');
                          $years =  $myComment->created_at->format('Y');
                          $day =  $myComment->created_at->format('d');

                          $date = \Carbon\Carbon::now()->toDateTimeString();
                          $carbon_date = \Carbon\Carbon::parse($date);
                          $new = $carbon_date->addHours(2);

                          $currentTime = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date);
                          $timeDatabase = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $myComment->created_at);

                          $difference = $timeDatabase->diff($currentTime);

                          /*$totalDuration = $currentTime->diffForHumans($timeDatabase);
                          $diff_in_days = $currentTime->diffInDays($timeDatabase);
                          $diff_in_months = $currentTime->diffInMonths($timeDatabase);
                          $diff_in_years = $currentTime->diffInYears($timeDatabase);
                          $diff_in_hours = $currentTime->diffInHours($timeDatabase);
                          $diff_in_minutes = $currentTime->diffInMinutes($timeDatabase);
                          $diff_in_seconds = $currentTime->diffInSeconds($timeDatabase);*/

                          $currentDateTime = $myComment->created_at;
                          $timeAMOrPM = date('h:i A', strtotime($currentDateTime));
                          ?>

                          @if($difference->s < 60 && $difference->h ==0 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                              <span > Since {{$difference->s }} min </span>
                          @elseif( $difference->h < 24 && $difference->days == 0 && $difference->m == 0 &&$difference->y ==0)
                              <span class="text-muted pull-right"> Since {{$difference->h}}h</span>

                          @elseif($difference->days == 1 && $difference->m == 0 &&$difference->y ==0 )
                              <span class="text-muted pull-right"> Since Yesterday</span>
                          @else
                              @if($month == 1)
                                  <span class="text-muted pull-right"> Since {{$day}} Jan. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 2)
                                  <span class="text-muted pull-right"> Since {{$day}} Feb. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 3)
                                  <span class="text-muted pull-right"> Since {{$day}} Mar. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 4)
                                  <span class="text-muted pull-right"> Since {{$day}} Apr. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 5)
                                  <span class="text-muted pull-right"> Since {{$day}} May. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 6)
                                  <span class="text-muted pull-right"> Since {{$day}} June. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 7)
                                  <span class="text-muted pull-right"> Since {{$day}} July. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 8)
                                  <span class="text-muted pull-right"> Since {{$day}} Aug. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 9)
                                  <span class="text-muted pull-right"> Since {{$day}} sept. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 10)
                                  <span class="text-muted pull-right"> Since {{$day}} Oct. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 11)
                                  <span class="text-muted pull-right"> Since {{$day}} Nov. {{$years}} at {{$timeAMOrPM}}</span>
                              @elseif($month == 12)
                                  <span class="text-muted pull-right"> Since {{$day}} Dec. {{$years}} at {{$timeAMOrPM}}</span>

                              @endif

                          @endif



                      </span><!-- /.username -->
                                                                        {{$myComment->content}}
                                                                    </div>
                                                                    <!-- /.comment-text -->
                                                                </div>

                                                            </div>
                                                        @endforeach

                                                    @endif

                                                    <div class="box-footer">
                                                        <form action="#" method="post">
                                                            <img id="mycomment" class="img-responsive img-circle img-sm mycomment mycomment2" src="{{URL::asset('images/users/'.auth()->user()->image)}}" alt="Alt Text">
                                                            <!-- .img-push is used to add margin to elements next to floating images -->
                                                            <div class="img-push">
                                                                <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.box-footer -->
                                                </div>
                                                <!-- /.box -->
                                            </div>


                                        </div>
                                </div>






                                    @endforeach
                                    <form>

                                        <input style="visibility: hidden"  type="text" value="{{$countAllRowsForMyPost}}" id="but_more_for_mypost">
                                        <div  class="form-group col-md-12" >
                                            <input  id='but_more_for_myPost' type="button" value="More" class="btn btn-primary  btn-block py-3 px-5 col-md-12">
                                        </div>
                                    </form>

                                </div>
                            </div>

                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="ChangePassword">
                            <form  id="editUserPassword" class="userpassword">
                            {{ csrf_field() }}
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                          Try To Update Your Password
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->

                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">


                                        <h3 class="timeline-header"><a href="#">Current Password</a></h3>

                                        <div class="timeline-body">
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                    <input value="" type="password" class="form-control form-control-user" name="editcurrentpassword" id="currentpassworduser" placeholder="Current Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">

                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">


                                        <h3 class="timeline-header"><a href="#">New Password</a></h3>

                                        <div class="timeline-body">
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                    <input value="" type="password" class="form-control form-control-user" name="editnewpassword" id="newpassworduser" placeholder="New Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">

                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">


                                        <h3 class="timeline-header"><a href="#">Confirm Password</a></h3>

                                        <div class="timeline-body">
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                    <input value="" type="password" class="form-control form-control-user" name="editconfirmpassword" id="confirmpassworduser" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">

                                        </div>
                                    </div>
                                </li>

                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-green">
                          Let's Go
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->

                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">


                                        <h3 class="timeline-header"><a href="#">Press Here</a></h3>

                                        <div class="timeline-body">
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button id="updatePassword" class="btn btn-primary" value="Edit Password">Edit Password</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">

                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                            </form>
                        </div>






                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" id="edit_User_Information">
                                {{ csrf_field() }}
                                <input type="hidden" name="lang" value="{{ App::getLocale() }}">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">First Name</label>

                                    <div class="col-sm-10">

                                        <input value="{{auth()->user()->fname}}" type="text" class="form-control form-control-user" name="editfname" id="fnameuser" placeholder="First Name">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Middle Name</label>

                                    <div class="col-sm-10">
                                        <input value="{{auth()->user()->mname}}" type="text" class="form-control form-control-user" name="editmname" id="mnameuser" placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>

                                    <div class="col-sm-10">
                                        <input value="{{auth()->user()->lname}}" type="text" class="form-control form-control-user" name="editlname" id="lnameuser" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Email Address</label>

                                    <div class="col-sm-10">
                                        <input value="{{auth()->user()->email}}" type="email" class="form-control form-control-user" name="editemail" id="emailuser" placeholder="Email Address">
                                    </div>
                                </div>
                                @if($checkUser->type_id == 1 || $checkUser->type_id == 2|| $checkUser->type_id == 3|| $checkUser->type_id == 4|| $checkUser->type_id == 5 )
                                 @if($allusers == null)
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Age</label>

                                    <div class="col-sm-10">
                                        <input value="" type="text" class="form-control form-control-user" name="addage" id="ageuser" placeholder="Age">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Birthdate</label>

                                    <div class="col-sm-10">
                                        <input value="" type="date" class="form-control form-control-user" name="addbirthdate" id="birthdateuser" placeholder="Birthdate">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Work Hours</label>

                                    <div class="col-sm-10">
                                        <input value="" type="text" class="form-control form-control-user" name="addworkhours" id="workhoursuser" placeholder="Work Hours">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-10">
                                        <input value="" type="phone" class="form-control form-control-user" name="addphone" id="phoneuser" placeholder="Phone">
                                    </div>
                                </div>
                                   @if(auth()->user()->type_id == 1)
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Salary</label>

                                        <div class="col-sm-10">
                                            <input value="" type="text" class="form-control form-control-user" name="addsalary" id="salaryuser" placeholder="Salary">
                                        </div>
                                    </div>
                                    @endif
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-10">
                                        <input value="" type="text" class="form-control form-control-user" name="addAddress"  id="addressuser"  placeholder="Address">
                                    </div>
                                </div>

                                        @elseif($allusers != null)

                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Age</label>

                                            <div class="col-sm-10">
                                                <input value="{{$allusers->age}}" type="text" class="form-control form-control-user" name="editage" id="ageuser" placeholder="Age">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Birthdate</label>

                                            <div class="col-sm-10">
                                                <input value="{{$allusers->birthdate}}" type="date" class="form-control form-control-user" name="editbirthdate" id="birthdateuser" placeholder="Birthdate">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Work Hours</label>

                                            <div class="col-sm-10">
                                                <input value="{{$allusers->workhours}}" type="text" class="form-control form-control-user" name="editworkhours" id="workhoursuser" placeholder="Work Hours">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Phone</label>

                                            <div class="col-sm-10">
                                                <input value="{{$allusers->phone}}" type="phone" class="form-control form-control-user" name="editphone" id="phoneuser" placeholder="Phone">
                                            </div>
                                        </div>
                                        @if(auth()->user()->type_id == 1)
                                            <div class="form-group">
                                                <label for="inputSkills" class="col-sm-2 control-label">Salary</label>

                                                <div class="col-sm-10">
                                                    <input value="{{$allusers->salary}}" type="text" class="form-control form-control-user" name="editsalary" id="salaryuser" placeholder="Salary">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Address</label>

                                            <div class="col-sm-10">
                                                <input value="{{$allusers->Address}}" type="text" class="form-control form-control-user" name="editAddress"  id="addressuser"  placeholder="Address">
                                            </div>
                                        </div>

                                @endif
                                @endif

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button useredit_fname='"+{{auth()->user()->fname}}+"' useredit_fname='"+{{auth()->user()->mname}}+"' id="update_user_data" class="btn btn-primary" value="Update Information">Update Information</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->




                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="ChangeProfilePicture">

                            <form enctype="multipart/form-data" action="{{route('updateprofilepicture')}}" method="POST">
                                {{csrf_field()}}
                                <img src="{{URL::asset('images/users/'.auth()->user()->image)}}" style="margin:10px" height="200" width="200" id="imagePreviewPicture" />
                                <input id="mine" type="file" style="width:200px;border:5px" name="profileimage" accept="image/jpeg , image/png " onchange="ShowImagePreview(this, document.getElementById('imagePreviewPicture'))" />


                                <input style="width: 320px" type="submit" class="btn btn-primary " value="Change">


                            </form>

                        </div>
                        <!-- /.tab-pane -->





                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->


@endsection

@section('scripts')
            <script src="{{URL::asset('jquery-3.0.0.min.js')}}"></script>

    <script type="text/javascript">


        function ShowImagePreview(imageUploader, previewImage) {
            if (imageUploader.files && imageUploader.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewImage).attr('src', e.target.result);
                }
                reader.readAsDataURL(imageUploader.files[0]);
            }
        }


        function ShowImagePreviewForPost(imageUploader, previewImage) {
            document.getElementById("showScroll").style.display = "block";
            if (imageUploader.files && imageUploader.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewImage).attr('src', e.target.result);
                }
                reader.readAsDataURL(imageUploader.files[0]);
            }
        }
        $(document).on('click' , '#updatePassword' ,function(e){
            e.preventDefault();
            var form= $('#editUserPassword').serialize();
            $.ajax({
                type: 'post',
                url : "{{url('/updatepassword')}}" ,
                data:  form,
                success : function(data){
                    if(data.result == true){
                        alert(data.msg)
                        $('#currentpassworduser').val('');
                        $('#newpassworduser').val('');
                        $('#confirmpassworduser').val('');
                    }else {
                        alert(data.msg)
                    }

                },
                error : function (reject){

                },
            });

        });


        $(document).on('click' , '#update_user_data' ,function(e){
            e.preventDefault();
            var form= $('#edit_User_Information').serialize();
            $.ajax({
                type: 'post',
                url : "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/updateProfileUser') }}" ,
                data:  form,
                success : function(data){
                    if(data.result == true){
                        alert(data.msg)
                        var useredit_fname =  document.getElementById("fnameuser").value;
                        var useredit_mname =  document.getElementById("mnameuser").value;

                        document.getElementById("fnameuserforpage").innerHTML = useredit_fname;
                        document.getElementById("mnameuserforpage").innerHTML = useredit_mname;

                        document.getElementById("fnameuserforpage2").innerHTML = useredit_fname;
                        document.getElementById("mnameuserforpage2").innerHTML = useredit_mname;
                    }else {
                        alert(data.msg)
                    }

                },
                error : function (reject){

                },
            });

        });


        var skipformypost = 0;
        $('#but_more_for_myPost').click(function(){


            skipformypost+=4;
            fetchMyPosts(skipformypost);

        });


        function fetchMyPosts(skipformypost){

            var but_more_for_mypost = Number($('#but_more_for_mypost').val().trim());
            $.ajax({
                url: '/showmoreformypost/'+skipformypost ,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    var len = 0;


                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    if(skipformypost <= but_more_for_mypost) {

                        if(len > 0){




                            for (var i = 0; i < len; i++) {

                                var content = response['data'][i].content;
                                var image = response['data'][i].image;
                                var owner_id = response['data'][i].owner_id;

                                var id = response['data'][i].id;

                                var userimage = document.getElementById("imguser").value;
                                var userfname = document.getElementById("fnuser").value;
                                var usermname = document.getElementById("mnuser").value;
                                var userid = document.getElementById("iduser").value;


                                var imgpost = "";
                                var imguser = "images/users/" + userimage;


                                let postDate = new Date(response['data'][i].created_at);
                                let currentDate = new Date();

                                var postDate_Day = postDate.getDate();
                                var postDate_Mounth = postDate.getMonth();
                                var postDate_years = postDate.getFullYear();

                                var differente_Hours = Math.abs(currentDate.getHours() - postDate.getHours());
                                var differente_Minutes = Math.abs(currentDate.getMinutes() - postDate.getMinutes());
                                var differente_Seconds = Math.abs(currentDate.getSeconds() - postDate.getSeconds());

                                var diff_Date = Math.floor((Date.UTC(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate()) - Date.UTC(postDate.getFullYear(), postDate.getMonth(), postDate.getDate()) ) / (1000 * 60 * 60 * 24))


                                var years = Math.floor(diff_Date / 365);
                                var months = Math.floor(diff_Date % 365 / 30);
                                var days = Math.floor(diff_Date % 365 % 30);


                                var hours = postDate.getHours();
                                var ampm = (hours >= 12) ? "PM" : "AM";

                                var dateTime = "";
                                if (differente_Seconds < 60 && differente_Minutes == 0 && differente_Hours == 0 && days == 0 && months == 0 && years == 0) {
                                    dateTime = "Now";
                                } else if (differente_Minutes < 60 && differente_Hours == 0 && days == 0 && months == 0 && years == 0) {
                                    dateTime = differente_Minutes + " Min";
                                } else if (differente_Hours < 24 && days == 0 && months == 0 && years == 0) {
                                    dateTime = differente_Hours + " H";
                                } else if (days == 1 && months == 0 && years == 0) {
                                    dateTime = "Since Yesterday";
                                }
                                else if (months == 1) {
                                    dateTime = "Since " + postDate_Day + " Jan. " + postDate_years + " at " + ampm + ""
                                } else if (months == 2) {
                                    dateTime = "Since " + postDate_Day + " Feb. " + postDate_years + " at " + ampm + ""
                                } else if (months == 3) {
                                    dateTime = "Since " + postDate_Day + " Mar. " + postDate_years + " at " + ampm + ""
                                } else if (months == 4) {
                                    dateTime = "Since " + postDate_Day + " Apr. " + postDate_years + " at " + ampm + ""
                                } else if (months == 5) {
                                    dateTime = "Since " + postDate_Day + " May. " + postDate_years + " at " + ampm + ""
                                } else if (months == 6) {
                                    dateTime = "Since " + postDate_Day + " June. " + postDate_years + " at " + ampm + ""
                                } else if (months == 7) {
                                    dateTime = "Since " + days + " July. " + postDate_years + " at " + ampm + ""
                                } else if (months == 8) {
                                    dateTime = "Since " + postDate_Day + " Aug. " + postDate_years + " at " + ampm + ""
                                } else if (months == 9) {
                                    dateTime = "Since " + postDate_Day + " sept. " + postDate_years + " at " + ampm + ""
                                } else if (months == 10) {
                                    dateTime = "Since " + postDate_Day + " Oct. " + postDate_years + " at " + ampm + ""
                                } else if (months == 11) {
                                    dateTime = "Since " + postDate_Day + " Nov. " + postDate_years + " at " + ampm + ""
                                } else if (months == 12) {
                                    dateTime = "Since " + postDate_Day + " Dec. " + postDate_years + " at " + ampm + ""
                                }

                                //name link -> url in javascript
                                // date in javascript

                                if (image != null) {
                                    var imgpost = "images/users/" + image;
                                } else {
                                    var imgpost = "";
                                }


                                var baseUrl = "{{ asset('images/users/') }}";
                                var imageForPost = baseUrl + "/" + image;
                                var imageForUser = baseUrl + "/" + userimage;


                                var url = "{{url('profile/')}}";
                                var urlForUser = url + "/" + userid;

                                var result_str = " <div id= 'postings' class='row'>" +
                                    " <div class='col-md-12'>" +

                                    "<div class='box box-widget'>" +
                                    " <div class='box-header with-border'>" +
                                    " <div class='user-block'>" +
                                    " <img class='img-circle' src='" + imageForUser + "' alt='User Image'>" +
                                    " <span class='username'><a href='" + urlForUser + "'>" + userfname + " " + usermname + "</a></span>" +
                                    " <span class='description'>" + dateTime + "</span>" +
                                    " </div>" +
                                    " <div class='box-tools'>" +
                                    "<button type='button' class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'>" +
                                    "<i class='fa fa-circle-o'></i></button>" +
                                    "<button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i>" +
                                    " </button>" +
                                    " <button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>" +
                                    " </div>" +
                                    " </div>" +
                                    " <div class='box-body'>" +
                                    " <img style='display: block' id='check' class='img-responsive pad' src='" + imageForPost + "' alt='Photo'>" +
                                    " <p>" + content + "</p>" +
                                    " <button type='button' class='btn btn-default btn-xs'><i class='fa fa-share'></i> Share</button>" +
                                    " <button type='button' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Like</button>" +
                                    "  <span class='pull-right text-muted'>127 likes - 3 comments</span>" +
                                    " </div>" +

                                    "  <div class='box-footer'>" +
                                    " <form action='#' method='post'>" +
                                    " <img class='img-responsive img-circle img-sm' src='" + imguser + "' alt='Alt Text'>" +
                                    "<div class='img-push'>" +
                                    "<input type='text' class='form-control input-sm' placeholder='Press enter to post comment'>" +
                                    " </div>" +
                                    " </form>" +
                                    " </div>" +
                                    " </div>" +
                                    " </div>" +
                                    " </div>" +

                                    "</div>";

                                $("#postreturndata").prepend(result_str);


                            }

                        }else{

                        }
                    }else{
                        document.getElementById('but_more_for_myPost').style.visibility = 'hidden';
                    }

                }
            });
        }



        var skip =0;
        $('#but_more').click(function(){


            skip+=4;
            fetchPosts(skip);

        });


        function fetchPosts(skip){

            var countAllRows = Number($('#countAllRows').val().trim());
            $.ajax({
                url: '/showmore/'+skip ,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    var len = 0;

                    var skip2 = skip+4;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    if(skip <= countAllRows) {

                    if(len > 0){




                            for (var i = 0; i < len; i++) {

                                var content = response['data'][i].content;
                                var image = response['data'][i].image;
                                var owner_id = response['data'][i].owner_id;

                                var userimage = document.getElementById("imguser").value;
                                var userfname = document.getElementById("fnuser").value;
                                var usermname = document.getElementById("mnuser").value;
                                var userid = document.getElementById("iduser").value;


                                var imgpost = "";
                                var imguser = "images/users/" + userimage;


                                let postDate = new Date(response['data'][i].created_at);
                                let currentDate = new Date();

                                var postDate_Day = postDate.getDate();
                                var postDate_Mounth = postDate.getMonth();
                                var postDate_years = postDate.getFullYear();

                                var differente_Hours = Math.abs(currentDate.getHours() - postDate.getHours());
                                var differente_Minutes = Math.abs(currentDate.getMinutes() - postDate.getMinutes());
                                var differente_Seconds = Math.abs(currentDate.getSeconds() - postDate.getSeconds());

                                var diff_Date = Math.floor((Date.UTC(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate()) - Date.UTC(postDate.getFullYear(), postDate.getMonth(), postDate.getDate()) ) / (1000 * 60 * 60 * 24))


                                var years = Math.floor(diff_Date / 365);
                                var months = Math.floor(diff_Date % 365 / 30);
                                var days = Math.floor(diff_Date % 365 % 30);


                                var hours = postDate.getHours();
                                var ampm = (hours >= 12) ? "PM" : "AM";

                                var dateTime = "";
                                if (differente_Seconds < 60 && differente_Minutes == 0 && differente_Hours == 0 && days == 0 && months == 0 && years == 0) {
                                    dateTime = "Now";
                                } else if (differente_Minutes < 60 && differente_Hours == 0 && days == 0 && months == 0 && years == 0) {
                                    dateTime = differente_Minutes + " Min";
                                } else if (differente_Hours < 24 && days == 0 && months == 0 && years == 0) {
                                    dateTime = differente_Hours + " Hours";
                                } else if (days == 1 && months == 0 && years == 0) {
                                    dateTime = "Since Yesterday";
                                }

                                else if (months == 1) {
                                    dateTime = "Since " + postDate_Day + " Jan. " + postDate_years + " at " + ampm + ""
                                } else if (months == 2) {
                                    dateTime = "Since " + postDate_Day + " Feb. " + postDate_years + " at " + ampm + ""
                                } else if (months == 3) {
                                    dateTime = "Since " + postDate_Day + " Mar. " + postDate_years + " at " + ampm + ""
                                } else if (months == 4) {
                                    dateTime = "Since " + postDate_Day + " Apr. " + postDate_years + " at " + ampm + ""
                                } else if (months == 5) {
                                    dateTime = "Since " + postDate_Day + " May. " + postDate_years + " at " + ampm + ""
                                } else if (months == 6) {
                                    dateTime = "Since " + postDate_Day + " June. " + postDate_years + " at " + ampm + ""
                                } else if (months == 7) {
                                    dateTime = "Since " + days + " July. " + postDate_years + " at " + ampm + ""
                                } else if (months == 8) {
                                    dateTime = "Since " + postDate_Day + " Aug. " + postDate_years + " at " + ampm + ""
                                } else if (months == 9) {
                                    dateTime = "Since " + postDate_Day + " sept. " + postDate_years + " at " + ampm + ""
                                } else if (months == 10) {
                                    dateTime = "Since " + postDate_Day + " Oct. " + postDate_years + " at " + ampm + ""
                                } else if (months == 11) {
                                    dateTime = "Since " + postDate_Day + " Nov. " + postDate_years + " at " + ampm + ""
                                } else if (months == 12) {
                                    dateTime = "Since " + postDate_Day + " Dec. " + postDate_years + " at " + ampm + ""
                                }

                                //name link -> url in javascript
                                // date in javascript

                                if (image != null) {
                                    var imgpost = "images/users/" + image;
                                } else {
                                    var imgpost = "";
                                }


                                var baseUrl = "{{ asset('images/users/') }}";
                                var imageForPost = baseUrl + "/" + image;
                                var imageForUser = baseUrl + "/" + userimage;


                                var url = "{{url('profile/')}}";
                                var urlForUser = url + "/" + userid;

                                var result_str = " <div id= 'postings' class='row'>" +
                                    " <div class='col-md-12'>" +

                                    "<div class='box box-widget'>" +
                                    " <div class='box-header with-border'>" +
                                    " <div class='user-block'>" +
                                    " <img class='img-circle' src='" + imageForUser + "' alt='User Image'>" +
                                    " <span class='username'><a href='" + urlForUser + "'>" + userfname + " " + usermname + "</a></span>" +
                                    " <span class='description'>" + dateTime + "</span>" +
                                    " </div>" +
                                    " <div class='box-tools'>" +
                                    "<button type='button' class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'>" +
                                    "<i class='fa fa-circle-o'></i></button>" +
                                    "<button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i>" +
                                    " </button>" +
                                    " <button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>" +
                                    " </div>" +
                                    " </div>" +
                                    " <div class='box-body'>" +
                                    " <img style='display: block' id='check' class='img-responsive pad' src='" + imageForPost + "' alt='Photo'>" +
                                    " <p>" + content + "</p>" +
                                    " <button type='button' class='btn btn-default btn-xs'><i class='fa fa-share'></i> Share</button>" +
                                    " <button type='button' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Like</button>" +
                                    "  <span class='pull-right text-muted'>0 likes - 0 comments</span>" +
                                    " </div>" +

                                    "  <div class='box-footer'>" +
                                    " <form action='#' method='post'>" +
                                    " <img class='img-responsive img-circle img-sm' src='" + imguser + "' alt='Alt Text'>" +
                                    "<div class='img-push'>" +
                                    "<input type='text' class='form-control input-sm' placeholder='Press enter to post comment'>" +
                                    " </div>" +
                                    " </form>" +
                                    " </div>" +
                                    " </div>" +
                                    " </div>" +
                                    " </div>" +

                                    "</div>";

                                $("#allpost").prepend(result_str);


                            }

                    }else{

                    }
                    }else{
                        document.getElementById('but_more').style.visibility = 'hidden';
                    }

                }
            });
        }


        $('#datetime').on('click', function(event){


            let postDate = new Date("2020-12-26 20:11:31");
            let currentDate = new Date();

            var differente_Hours = Math.abs(currentDate.getHours() - postDate.getHours());
            var differente_Minutes = Math.abs(currentDate.getMinutes() - postDate.getMinutes());
            var differente_Seconds = Math.abs(currentDate.getSeconds() - postDate.getSeconds());

            var diff_Date =  Math.floor((Date.UTC(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate()) - Date.UTC(postDate.getFullYear(), postDate.getMonth(), postDate.getDate()) ) /(1000 * 60 * 60 * 24))
            alert(diff_Date + " \n");
            alert(currentDate+"\n"+postDate +" \n"+ differente_Hours + ":"+ differente_Minutes + ":"+differente_Seconds );


            var years = Math.floor(diff_Date / 365);
            var months = Math.floor(diff_Date % 365 / 30);
            var days = Math.floor(diff_Date % 365 % 30);

            alert( years + "/"+ months + "/"+days +"\n");

            var hours = postDate.getHours();
            var ampm = (hours >= 12) ? "PM" : "AM";
            alert ('Toronto time: ' + hours + ampm);
        });


            $('#postData').on('submit', function(event){
                event.preventDefault();

           // var form= $('#postData').serialize();
            //var form = new FormData(this);
           // var form= new FormData($('#postData')[0]);
           // alert(form)
            $.ajax({
                type: 'post',
                url : "{{ route('postStore')}}" ,
                data:  new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success : function(data){
                    if(data.result == true){
                        $('#exampleInputPost').val('');
                        $('#imagePreview').attr('src', '');
                        document.getElementById("showScroll").style.display = "none";

                        var content = data.data.content;
                        var image = data.data.image;
                        var owner_id = data.data.owner_id;


                        var userimage =  document.getElementById("imguser").value;
                        var userfname = document.getElementById("fnuser").value;
                        var usermname = document.getElementById("mnuser").value;
                        var userid = document.getElementById("iduser").value;


                        var imgpost = "";
                        var imguser = "images/users/"+userimage;



                        let postDate = new Date(data.data.created_at);
                        let currentDate = new Date();

                        var postDate_Day = postDate.getDate();
                        var postDate_Mounth = postDate.getMonth();
                        var postDate_years = postDate.getFullYear();

                        var differente_Hours = Math.abs(currentDate.getHours() - postDate.getHours());
                        var differente_Minutes = Math.abs(currentDate.getMinutes() - postDate.getMinutes());
                        var differente_Seconds = Math.abs(currentDate.getSeconds() - postDate.getSeconds());

                        var diff_Date =  Math.floor((Date.UTC(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate()) - Date.UTC(postDate.getFullYear(), postDate.getMonth(), postDate.getDate()) ) /(1000 * 60 * 60 * 24))


                        var years = Math.floor(diff_Date / 365);
                        var months = Math.floor(diff_Date % 365 / 30);
                        var days = Math.floor(diff_Date % 365 % 30);


                        var hours = postDate.getHours();
                        var ampm = (hours >= 12) ? "PM" : "AM";

                        var dateTime = "";
                        if(differente_Seconds < 60 && differente_Minutes ==0 &&differente_Hours ==0 && days == 0 && months == 0 &&years ==0) {
                            dateTime = "Now";
                        }else if( differente_Minutes < 60 &&differente_Hours ==0 && days == 0 && months == 0 &&years ==0) {
                            dateTime = differente_Minutes+" Min";
                        }else if(differente_Hours <24 && days == 0 && months == 0 &&years ==0 ){
                            dateTime = differente_Hours + " Hours";
                        }else if( days == 1 && months == 0 &&years ==0){
                            dateTime = "Since Yesterday";
                        }else if(days < 30 || days< 31 && months == 0 &&years ==0){
                            dateTime = days+" Days";
                        }

                        else if(months == 1)
                        {
                            dateTime = "Since "+postDate_Day+" Jan. "+postDate_years+" at "+ampm+""
                        } else if(months == 2)
                        {
                            dateTime = "Since "+postDate_Day+" Feb. "+postDate_years+" at "+ampm+""
                        } else if(months == 3)
                        {
                            dateTime = "Since "+postDate_Day+" Mar. "+postDate_years+" at "+ampm+""
                        } else if(months == 4)
                        {
                            dateTime = "Since "+postDate_Day+" Apr. "+postDate_years+" at "+ampm+""
                        } else if(months == 5)
                        {
                            dateTime = "Since "+postDate_Day+" May. "+postDate_years+" at "+ampm+""
                        } else if(months == 6)
                        {
                            dateTime = "Since "+postDate_Day+" June. "+postDate_years+" at "+ampm+""
                        } else if(months == 7)
                        {
                            dateTime = "Since "+days+" July. "+postDate_years+" at "+ampm+""
                        } else if(months == 8)
                        {
                            dateTime = "Since "+postDate_Day+" Aug. "+postDate_years+" at "+ampm+""
                        } else if(months == 9)
                        {
                            dateTime = "Since "+postDate_Day+" sept. "+postDate_years+" at "+ampm+""
                        } else if(months == 10)
                        {
                            dateTime = "Since "+postDate_Day+" Oct. "+postDate_years+" at "+ampm+""
                        } else if(months == 11)
                        {
                            dateTime = "Since "+postDate_Day+" Nov. "+postDate_years+" at "+ampm+""
                        } else if(months == 12)
                        {
                            dateTime = "Since "+postDate_Day+" Dec. "+postDate_years+" at "+ampm+""
                        }

                        //name link -> url in javascript
                        // date in javascript

                        if(image != null){
                            var imgpost = "images/users/"+image;
                        }else{
                            var imgpost = "";
                        }


                        var baseUrl = "{{ asset('images/users/') }}";
                        var imageForPost = baseUrl +"/"+ image;
                        var imageForUser = baseUrl +"/"+ userimage;


                        var url = "{{url('profile/')}}";
                        var urlForUser = url +"/"+ userid;

                        var result_str = " <div id= 'postings' class='row'>"+
                                          " <div class='col-md-12'>" +

                                "<div class='box box-widget'>"+
                                " <div class='box-header with-border'>"+
                                " <div class='user-block'>"+
                                " <img class='img-circle' src='"+imageForUser+"' alt='User Image'>"+
                                " <span class='username'><a href='"+urlForUser+"'>"+userfname+" "+usermname+"</a></span>"+
                                " <span class='description'>"+dateTime+"</span>"+
                                " </div>"+
                                " <div class='box-tools'>"+
                                "<button type='button' class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'>"+
                                "<i class='fa fa-circle-o'></i></button>"+
                                "<button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i>"+
                                " </button>"+
                                " <button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>"+
                                " </div>"+
                                " </div>"+
                                " <div class='box-body'>"+
                                " <img style='display: block' id='check' class='img-responsive pad' src='"+imageForPost+"' alt='Photo'>"+
                                " <p>"+content+"</p>"+
                                " <button type='button' class='btn btn-default btn-xs'><i class='fa fa-share'></i> Share</button>"+
                                " <button type='button' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Like</button>"+
                                "  <span class='pull-right text-muted'>0 likes - 0 comments</span>"+
                            " </div>"+

                            "  <div class='box-footer'>"+
                                " <form action='#' method='post'>"+
                                " <img class='img-responsive img-circle img-sm' src='"+imguser+"' alt='Alt Text'>"+
                                "<div class='img-push'>"+
                                "<input type='text' class='form-control input-sm' placeholder='Press enter to post comment'>"+
                            " </div>"+
                            " </form>"+
                            " </div>"+
                            " </div>"+
                            " </div>"+
                            " </div>"+

                                           "</div>";
                        $("#postreturndata").prepend(result_str);
                        $("#allpost").prepend(result_str);

                    }else {
                        alert(data.error)
                    }

                },
                error : function (reject){

                },
            });

        });







        $('#UpdateImageProfile').on('submit', function(event){
            event.preventDefault();

            $.ajax({
                type: 'post',
                url : "{{ route('updateImageProfile')}}" ,
                data:  new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success : function(data){
                    if(data.result == true){
                        alert(data.msg)
                        $('#imagePreviewProfile').attr('src', 'images/users/'+ data.data.image);
                        $('#imgDropNav').attr('src', 'images/users/'+ data.data.image);
                        $('#imgNav').attr('src', 'images/users/'+ data.data.image);
                        $('#imgAsideAr').attr('src', 'images/users/'+ data.data.image);
                        $('#imgAsideEn').attr('src', 'images/users/'+ data.data.image);
                        $('.allpost').attr('src', 'images/users/'+ data.data.image);
                        $('.allcomment').attr('src', 'images/users/'+ data.data.image);
                        $('.allcomment2').attr('src', 'images/users/'+ data.data.image);
                        $('.mypost').attr('src', 'images/users/'+ data.data.image);
                        $('.mycomment').attr('src', 'images/users/'+ data.data.image);
                        $('.mycomment2').attr('src', 'images/users/'+ data.data.image);

                    }else {
                        alert(data.msg)
                    }

                },
                error : function (reject){

                },
            });

        });


        $(document).ready(function () {
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'Welcome to Dashgum!',
                // (string | mandatory) the text inside the notification
                text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for ',
                // (string | optional) the image to display on the left
                image: 'assets/img/ui-sam.jpg',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: true,
                // (int | optional) the time you want it to be alive for before fading out
                time: '',
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });

            return false;
        });


    </script>
@endsection
