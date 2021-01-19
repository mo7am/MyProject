<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use App\Providers\RouteServiceProvider;
use App\Traits\userTraits;
use Illuminate\Http\Request;
use App\Models\room;
use DB;
use App\Models\staff;
use App\Models\Specialist;
use App\Models\Mobile;
use App\Models\User;
use Hash;
use function PHPUnit\Framework\returnArgument;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function profile ($id = 0 )
    {

            $offset = 4;

            if ($id == null) {
                $posts = Post::with('comments')->take($offset)->orderBy('created_at', 'desc')->get();
            } else {
                $posts = Post::with('comments')->take($offset)->where('owner_id', $id)->orderBy('created_at', 'desc')->get();
            }
            $myPosts = Post::with('comments')->take($offset)->where('owner_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

            $checkUser = User::where('id', auth()->user()->id)->first();

            $allusers = staff::where('user_id', auth()->user()->id)->first();

            $allrows = Post::all();
            $countAllRows = $allrows->count();

            $countAllRowsForMyPost = $myPosts->count();
            return view('AnyUsersAdvancedPages.Pages.Profile', compact(['allusers', 'checkUser', 'posts', 'myPosts','countAllRows','countAllRowsForMyPost']));


    }



    public function showmore ( $skip = 0)
    {

        $posts =  Post::with('comments')->skip($skip)->take(4)->orderBy('id', 'desc')->get();

       // return view('AnyUsersAdvancedPages.Pages.Profile', compact(['allusers' , 'checkUser' , 'posts' , 'myPosts' ]));
        $postData['data'] = $posts;
        echo json_encode($postData);
        exit;


    }

    public function showmoreformypost ( $skip = 0)
    {

        $myPosts = Post::with('comments')->skip($skip)->take(4)->where('owner_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        // return view('AnyUsersAdvancedPages.Pages.Profile', compact(['allusers' , 'checkUser' , 'posts' , 'myPosts' ]));
        $postData['data'] = $myPosts;
        echo json_encode($postData);
        exit;


    }


    public function postStore(Request $request)
    {

       // var_dump( $request->file( 'image' ) );
      //  return "this is post content". $request->postContent . "post image " . $request->image;
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'postContent' => 'required',
        ]);

        if($request->image != null) {

            if ($validator->passes()) {
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                $input['image'] = $imageName;
                request()->image->move(public_path('images/users'), $imageName);

                $post = Post::create([
                    'image' => $imageName,
                    'content' => request('postContent'),
                    'owner_id' => auth()->user()->id,
                ]);

                return Response()->json(["result" => true, "data" => $post, "success" => "Post Added Successfully With Image"]);
            }
        }else
        {
            if ($validator->passes()) {
                $post = Post::create([
                    'content' => request('postContent'),
                    'owner_id' => auth()->user()->id,
                ]);

                return Response()->json(["result" => true, "data" => $post, "success" => "Post Added Successfully With No Image"]);
            }
        }

        return response()->json(["result"=>false,'error'=>$validator->errors()->all()]);

    }




    public function updateprofileimage(Request $request)
    {

        $id = auth()->user()->id;

        if(Input::hasFile('profileimage')){
            $file = Input::file('profileimage');
            $path = 'images/users';
            $file->move($path .'/' , $file->getClientOriginalName());
            $image = $file->getClientOriginalName();

            DB::update('update users set image = ? where id = ?',[$image,$id]);
        }


        /*$userData = User::where('id',auth()->user()->id)->first();
        if($userData){
            return response()->json(['result'=> true,'msg'=>'Update Image User Successfully','data'=>$userData ]);
        }else{
            return response()->json(['result'=> false,'msg'=>'Update Image User Failed']);
        }*/

        $checkUser = User::where('id',auth()->user()->id)->first();
        $allusers = staff::where('user_id', auth()->user()->id)->first();

        return redirect(RouteServiceProvider::Profile)->with(['allusers' , 'checkUser']);
    }


    //work
    public function UpdateImageProfile(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {
            $imageName = time() . '.' . request()->profileImage->getClientOriginalExtension();
            $input['profileImage'] = $imageName;
            request()->profileImage->move(public_path('images/users'), $imageName);

        }

        $userdata = User::where('id', auth()->user()->id)->first();
        if ($userdata != null) {
            $userdata->update([
                'image' => $imageName,
            ]);


            return response()->json(['result' => true, 'msg' => 'Profile Image Updated Successfully', 'data' => $userdata]);
        }
        else{
            return response()->json(['result' => false, 'msg' => 'No Data For This User']);

        }
    }


    public function updatepassword(Request $request)
    {
        $oldpass = $request->editcurrentpassword;
        $newpass = $request->editnewpassword;
        $confirmpass = $request->editconfirmpassword;

        $updatedUserPassword = User::where('id',auth()->user()->id)->first();

        $oldpassfromsession =  auth()->user()->password;

        if(Hash::check($oldpass , $oldpassfromsession))
        {
            if($newpass != $confirmpass)
            {
                return response()->json(['result'=> false,'msg'=>'Password Not Matched']);
            }else{
                $updatedUserPassword->update([
                    'password' => bcrypt($newpass)
                ]);
                return response()->json(['result'=> true,'msg'=>'Password Updated Successfully','data'=>$updatedUserPassword]);
            }
        }else{
            return response()->json(['result'=> false,'msg'=>'Current Password Incorrect']);
        }

    }



    public function UpdateProfileUser(Request $request)
    {

        $ToUpdateOnlyUser = User::where('id',auth()->user()->id)->first();
        $ToUpdateOnlyStaff = staff::where('user_id', auth()->user()->id)->first();

        $testuser = new User();
        $ToUpdateAllUserData  = DB::table('hotelsystembylaravel.users')
            ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
            ->where('users.id' ,'=' ,auth()->user()->id )
            ->select('*');
        // dd($ToUpdateAllUserData);
        if($ToUpdateOnlyUser->type_id == 1 || $ToUpdateOnlyUser->type_id == 2|| $ToUpdateOnlyUser->type_id == 3|| $ToUpdateOnlyUser->type_id == 4|| $ToUpdateOnlyUser->type_id == 5 )
        {
            if($ToUpdateOnlyStaff == null){
                $staff =  staff::create([
                    'age' => request('addage') ,
                    'birthdate' => request('addbirthdate') ,
                    'workhours' => request('addworkhours') ,
                    'phone' => request('addphone') ,
                    'Address' => request('addAddress') ,
                    'salary' => 0.0 ,
                    'user_id' => auth()->user()->id,
                ]);

                $ToUpdateOnlyUser->update([
                    'fname' => $request->editfname,
                    'mname' => $request->editmname,
                    'lname' => $request->editlname,
                    'email' => $request->editemail,
                ]);
                return response()->json(['result'=> true,'msg'=>'Your Information Added & Updated Successfully','dataUser'=>$ToUpdateOnlyUser , 'dataStaff' => $staff]);
            }else{

                if($ToUpdateOnlyUser->type_id == 1) {
                    $ToUpdateAllUserData->update([
                        'fname' => $request->editfname,
                        'mname' => $request->editmname,
                        'lname' => $request->editlname,
                        'email' => $request->editemail,
                        'salary' => $request->editsalary,
                        'age' => $request->editage,
                        'birthdate' => $request->editbirthdate,
                        'workhours' => $request->editworkhours,
                        'phone' => $request->editphone,
                        'Address' => $request->editAddress,
                    ]);
                    return response()->json(['result'=> true,'msg'=>'Manager Information Updated Successfully','dataUser'=>$ToUpdateAllUserData ]);
                }else{
                    $ToUpdateAllUserData->update([
                        'fname' => $request->editfname,
                        'mname' => $request->editmname,
                        'lname' => $request->editlname,
                        'email' => $request->editemail,
                        'age' => $request->editage,
                        'birthdate' => $request->editbirthdate,
                        'workhours' => $request->editworkhours,
                        'phone' => $request->editphone,
                        'Address' => $request->editAddress,
                    ]);
                    return response()->json(['result'=> true,'msg'=>'Staff Information Updated Successfully ','data'=>$ToUpdateAllUserData ]);

                }

            }
        }elseif($ToUpdateOnlyUser->type_id == 6 || $ToUpdateOnlyUser->type_id == 7){
            $ToUpdateOnlyUser->update([
                'fname' => $request->editfname,
                'mname' => $request->editmname,
                'lname' => $request->editlname,
                'email' => $request->editemail,
            ]);

            return response()->json(['result'=> true,'msg'=>'Guest Information Updated Successfully','dataUser'=>$ToUpdateOnlyUser ]);
        }else{
            return response()->json(['result'=> true,'msg'=>'This Type Not Found']);

        }

    }









//////////////////////////////////////////////Posts/////////////////////////////////////

public function getAllPosts()
{
    $posts = Post::all();
    return view('AnyUsersAdvancedPages.Pages.Profile', compact(['posts']));

}

////////////////////////////////////////////////////////////////////////////////////////
///



    function getimage()
    {
        return view('ajax_upload');
    }

    function action(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($validation->passes())
        {
            $image = $request->file('select_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            return response()->json([
                'message'   => 'Image Upload Successfully',
                'uploaded_image' => '<img src="/images/'.$new_name.'" class="img-thumbnail" width="300" />',
                'class_name'  => 'alert-success'
            ]);
        }
        else
        {
            return response()->json([
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }
    }






}
