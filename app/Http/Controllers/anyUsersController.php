<?php

namespace App\Http\Controllers;

use App\Traits\userTraits;
use Illuminate\Http\Request;
use App\Models\room;
use DB;
use App\Models\staff;
use App\Models\User;

use Validator;
use Response;
use Illuminate\Support\Facades\Input;


class anyUsersController extends Controller
{


    use userTraits;
    
    //
    public function indexAnyUser ()
    {
    	 return view ('anyUsersPages.pagesAnyUsersPages.index');
    }
     public function aboutAnyUser ()
    {
    	 return view ('anyUsersPages.pagesAnyUsersPages.about');
    }
   
     public function blogAnyUser ()
    {
    	 return view ('anyUsersPages.pagesAnyUsersPages.blog');
    }
     public function availableRooms ()
    {
    	 return view ('anyUsersPages.pagesAnyUsersPages.availableRooms');
    }
     public function contactAnyUser ()
    {
    	 return view ('anyUsersPages.pagesAnyUsersPages.contact');
    }
     public function profile ()
    {
    	 return view ('anyUsersPages.pagesAnyUsersPages.profile');
    }
     public function services ()
    {
    	 return view ('anyUsersPages.pagesAnyUsersPages.services');
    }
     public function work ()
    {
    	 return view ('anyUsersPages.pagesAnyUsersPages.work');
    }





   //manager
    public function getAllRooms()
    {
        $rooms = room::where('state_id' , '=' , 1 );
        return view('anyUsersPages.pagesAnyUsersPages.availableRooms' , compact('rooms'));
    }

 public function CrudUsers()
    {
        
 //$rooms = room::where('state_id' , '=' , 1 );
         $allusers  = DB::table('hotelsystembylaravel.users')
      ->join('hotelsystembylaravel.staff' , 'users.Id' ,'=' ,'staff.user_id')
     ->where([
         ['users.type_id' ,'!=' ,1],
     ])
      ->select('*')
      ->paginate(16)
      ;

       return view('anyUsersPages.pagesAnyUsersPages.CrudUsers' , compact('allusers'))->with('i',(request()->input('page',1) -1) *16);
       return view('anyUsersPages.pagesAnyUsersPages.CrudUsers');
        
    }
    

   /*  public function ViewAllUsers()
    {
        //$rooms = room::where('state_id' , '=' , 1 );
         $allusers  = DB::table('hotelsystembylaravel.users')
      ->join('hotelsystembylaravel.staff' , 'users.id' ,'=' ,'staff.user_id')
     ->where('users.type_id' ,'!=' ,1 )
      ->select('*')
      ->paginate(16)
      ;

       return view('anyUsersPages.pagesAnyUsersPages.CrudUsers' , compact('allusers'))->with('i',(request()->input('page',1) -1) *16);

       return view('anyUsersPages.pagesAnyUsersPages.ViewAllUsers');
        
    }*/


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


      /* // $file_name =   $this->saveImage(request('ImageUpload') , 'images/users');

        if($request->ImageUpload != null) {
            $image = $request->ImageUpload;
            $file_extension = $image->getClientOriginalExrension();
            $file_name = time() . '.' . $file_extension;
            $path = 'images/users';
            $image->move($path, $file_name);
        }else{
            dd('No Image Was Found');
        }*/

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
      ->join('hotelsystembylaravel.staff' , 'users.Id' ,'=' ,'staff.user_id')
     ->where('users.Id' ,'=' ,$testuser->id )
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
       ->join('hotelsystembylaravel.staff' , 'users.Id' ,'=' ,'staff.user_id')
       ->where('users.Id' ,'=' ,$request->editid )
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
        
       

         $testuser->Id = $request->editid;
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
                    ->leftJoin('hotelsystembylaravel.staff','users.Id', '=','staff.user_id')
                    ->where('users.Id', $request->id); 
     

       if(! $thisuser)
       {
        return response()->json(['result'=> false,'msg'=>'Insertion New User Faild']);
       }else{
       
        DB::table('hotelsystembylaravel.staff')->where('user_id', $request->id)->delete();                           
        $thisuser->delete();
       
         return response()->json(['result'=> true,'msg'=>'Delete User Successfully']);
       }

   }


    public function geteditUserByManager(Request $request)
   {
    $thisuser  = DB::table('hotelsystembylaravel.users')
       ->join('hotelsystembylaravel.staff' , 'users.Id' ,'=' ,'staff.user_id')
       ->where('users.Id' ,'=' ,4 )
       ->select('*')
       ->get();

     

       if(! $thisuser)
       {
        return response()->json(['result'=> false,]);
       }else{
        
       
         return response()->json([
            'result'=> true,
            
            'data' => $thisuser,
        ]);
       }

   }



   public function SearchUsers($id = 0)
   {
     if($id==0){ 
       
         $thisusers  = DB::table('hotelsystembylaravel.users')
       ->join('hotelsystembylaravel.staff' , 'users.Id' ,'=' ,'staff.user_id')
       ->where('users.type_id' ,'!=' ,1 ) 
       ->select('*')
       ->get();
     }else{   
        
        $thisusers  = DB::table('hotelsystembylaravel.users')
       ->join('hotelsystembylaravel.staff' , 'users.Id' ,'=' ,'staff.user_id')
       ->where([
           ['users.Id' ,'=' ,$id ],
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
                ->join('hotelsystembylaravel.staff' , 'users.Id' ,'=' ,'staff.user_id')
                ->where('users.type_id' ,'!=' ,1 )
                ->select('*')
                ->get();
        }else{

            $thisusers  = DB::table('hotelsystembylaravel.users')
                ->join('hotelsystembylaravel.staff' , 'users.Id' ,'=' ,'staff.user_id')
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


}
