<?php

namespace App\Http\Controllers;

use App\Models\roomtype;
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

class ManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function CrudForManager ()
    {
        //$rooms = room::where('state_id' , '=' , 1 );
        $allusers  = DB::table('hotelsystembylaravel.users')
            ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
            ->where([
                ['users.type_id' ,'!=' ,1],
            ])
            ->select('*')
            ->paginate(16)
        ;

        return view('AnyUsersAdvancedPages.Pages.crudStaff' , compact('allusers'))->with('i',(request()->input('page',1) -1) *16);

    }

    protected function saveImage($photo , $folder)
    {
        $file_extension = $photo->getClientMimeType();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo->move( $path,$file_name);

        return $file_name;
    }




    public function insertNewUserByManager(Request $request)
    {


        //  $file_name =   $this->saveImage(request('ImageUpload') , 'images/users');


        /*$userData = User::create([
           'fname' => request('fname') ,
           'mname' => request('mname') ,
           'lname' => request('lname') ,
           'email' => request('email') ,
           'password' => bcrypt(request('password')) ,
           'type_id' => request('status') ,
           'balance' => 0,
           'stateBlock' => 8,
           'image' => 'img-1.jpg',

         ]);*/


        $testuser = new User;
        $testuser->fname =request('fname');
        $testuser->mname = request('mname');
        $testuser->lname = request('lname');
        $testuser->email = request('email');
        //$testuser->image = $file_name;
        $testuser->password =  bcrypt(request('password'));
        $testuser->balance = 0;
        $testuser->stateBlock = 8;
        $testuser->type_id = request('status');
        $testuser->image = 'img-1.jpg';
        $testuser->save();

        /* $userData = DB::table('hotelsystembylaravel.users') ->insertGetId([

         'fname' => request('fname') ,
          'mname' => request('mname') ,
          'lname' => request('lname') ,
          'email' => request('email') ,
          'password' => bcrypt(request('password')) ,
          'type_id' => request('status') ,
          'balance' => 0,
          'stateBlock' => 8,
          'image' => 'img-1.jpg',
     ]);*/


        /*$user =  User::create([
          'fname' => request('fname') ,
          'mname' => request('mname') ,
          'lname' => request('lname') ,
          'email' => request('email') ,
          'password' => bcrypt(request('password')) ,
          'type_id' => 2 ,
          'balance' => 0,
          'stateBlock' => 8,
          'image' => 'img-1.jpg',

        ]);*/



        $staff =  staff::create([
            'age' => request('age') ,
            'birthdate' => request('birthdate') ,

            'workhours' => request('workhours') ,
            'phone' => request('phone') ,
            'Address' => request('Address') ,
            'salary' => request('salary') ,
            'user_id' => $testuser->id,

        ]);


        $thisuser  = DB::table('hotelsystembylaravel.users')
            ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
            ->where('users.id' ,'=' ,$testuser->id )
            ->select('*');

        if($testuser &&  $staff ){

            return response()->json(['result'=> true,'msg'=>'Insertion New User Successfully','data1'=>$testuser , 'data2' => $staff]);
        }else{
            return response()->json(['result'=> false,'msg'=>'Insertion New User Faild']);
        }


    }


    public function editUserByManager(Request $request)
    {

        $testuser = new User();
        $thisuser  = DB::table('hotelsystembylaravel.users')
            ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
            ->where('users.id' ,'=' ,$request->editid )
            ->select('*');

        if(! $thisuser)
        {
            return response()->json(['result'=> false,'msg'=>'Edit User Faild']);
        }else{
            $thisuser->update([
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
                'type_id' => $request->editstatus,

            ]);

            // $testuser->fname =  $thisuser->fname;



            $testuser->id = $request->editid;
            $testuser->fname = $request->editfname;
            $testuser->mname = $request->editmname;
            $testuser->lname = $request->editlname;
            $testuser->email = $request->editemail;
            $testuser->salary = $request->editsalary;
            $testuser->age = $request->editage;
            $testuser->birthdate = $request->editbirthdate;
            $testuser->workhours = $request->editworkhours;
            $testuser->phone = $request->editphone;
            $testuser->Address = $request->editAddress;
            $testuser->type_id = $request->editstatus;
            //$thisuser->save();
            return response()->json(['result'=> true,'msg'=>'Edit User Successfully','data'=>$testuser]);
        }

    }


    public function deleteUserByManager(Request $request)
    {

        $thisuser =DB::table('hotelsystembylaravel.users')
            ->leftJoin('hotelsystembylaravel.staff','users.id', '=','staff.user_id')
            ->where('users.id', $request->id);


        if(! $thisuser)
        {
            return response()->json(['result'=> false,'msg'=>'Insertion New User Faild']);
        }else{

            DB::table('hotelsystembylaravel.staff')->where('user_id', $request->id)->delete();
            $thisuser->delete();

            return response()->json(['result'=> true,'msg'=>'Delete User Successfully']);
        }

    }


    public function SearchUsers($id = 0)
    {
        if($id==0){

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
                ->where('users.type_id' ,'!=' ,1 )
                ->select('*')
                ->get();
        }else{

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
                ->where([
                    ['users.id' ,'=' ,$id ],
                    ['users.type_id' ,'!=' ,1],
                ])
                ->select('*')
                ->get();
        }
        // Fetch all records
        $userData['data'] = $thisusers;

        echo json_encode($userData);
        exit;
    }


    /**
     * @param string $stringValue
     */
    public function SearchUsersByLikeStatement($stringValue)
    {
        if(strlen($stringValue) == 0){

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
                ->where('users.type_id' ,'!=' ,1 )
                ->select('*')
                ->get();
        }else{

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
                ->where([
                    ['users.fname' ,'LIKE' ,'%'.$stringValue."%"],
                    ['users.mname' ,'LIKE' ,'%'.$stringValue."%"],
                    ['users.lname' ,'LIKE' ,'%'.$stringValue."%"],
                    ['users.email' ,'LIKE' ,'%'.$stringValue."%"],
                ])
                ->select('*')
                ->get();
        }
        // Fetch all records
        $userData['data'] = $thisusers;

        echo json_encode($userData);
        exit;
    }

public function blankPage()
{
    return view('AnyUsersAdvancedPages.Pages.blankpage');
}



//////////////////////////////////////Room Types//////////////////////////////////////



    public function index()
    {
        $alltyperooms = roomtype::orderBy('id' , 'DESC')->paginate(15);
        return view('AnyUsersAdvancedPages.Pages.crudRoomType' , compact('alltyperooms'));
    }


////////////////////////////////////End Room Types ////////////////////////////////////






























































    ////////////////////////////Begin Relations///////////////////////////////

    /////////////////////////// One To One///////////////////////////////////
    public function hasOneRelation()
    {

        // another way
       // $staff = staff::with('mobile')->where('StaffId','1')->first();

        $staff = staff::with(['mobile' => function($query){
            $query->select('code' , 'mobile','IdStaff' );
         }])->where('StaffId','5')->first();

      // return $staff -> StaffId;
      //  return $staff->mobile->code;
        return response()->json($staff);
    }


    public function hasOneReverseRelation()
    {

        $mobile = Mobile::with(['staff' => function($query){
            $query->select('salary' , 'age' ,'StaffId');
        }])->where('id','1')->first();

        //Make Some Attribute Visible
        $mobile->makeVisible(['IdStaff']);
        //$mobile->makeHidden(['IdStaff']);
         $mobile->staff;
        // return $mobile;
        return response()->json($mobile);
    }


    public function hasOne_WhereHas_Relation()
    {

       $users = staff::whereHas('mobile')->get();
        return response()->json($users);
    }

    public function hasOne_WhereDoesNotHave_Relation()
    {

        $users = staff::whereDoesntHave('mobile')->get();
        return response()->json($users);
    }



    public function hasOne_WhereHas_WithCondition_Relation()
    {

        $users = staff::whereHas('mobile' , function ($query){
            $query->where('code' , '002');
        })->get();
        return response()->json($users);
    }


/////////////////////////////// One To Many ////////////////////
    public function hasMany()
    {

       /* $specialist = Specialist::find(1);
        $specialist->staff;    //Get All Staff Of One Specialist*/

        /*$specialist = Specialist::with(['staff',function($query){
            $query->select('salary' , 'specialist_Id');
        } ])->where('Id','2')->first();

        foreach ($specialist as $staf)
            echo $staf->salary;
*/
        $specialist = Specialist::with(['staff' ])->find(2);



        return response()->json($specialist);


    }

    public function hasManyReverseRelation()
    {
        $staff = staff::where('StaffId','2')->first();
        $staff->specialist;
        return response()->json($staff);
    }
    ////////////////////////////End Relations//////////////////////////////////


}
