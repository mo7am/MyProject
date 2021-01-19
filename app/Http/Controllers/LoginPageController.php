<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginPageController extends Controller
{
    //
 protected $user;
 /* public function __construct()
{
    $this->user =  auth()->user();
}*/

     public function login_get ()
    {
         return view ('homePageHotel.PagesHomePageHotel.signup');
    }

    


     public function login_post ()
    {
       
        //return request()->all();
        $remember = request()->has('remember')?true:false;
        if(auth()->attempt(['email'=>request('email'),'password'=>request('password')],$remember)){
            $user = new User();
            $user = auth()->user();
            //return view('AnyUsersAdvancedPages.Pages.index',compact('user'));
            
            return redirect()->route('manager.indexAnyUserAdvanced');
            
            /*if( Auth()->user()->type_id == 1){
               return redirect('/indexAnyUser');
           }else 
             {
                 return redirect('/index');
             }*/
        }
         //return view ('homePageHotel.PagesHomePageHotel.signup');
        
    }


   protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            

        ]);
    }


  


    public function insertNewUser()
    {
         $remember = request()->has('remember')?true:false;
        User::create([
          'fname' => request('fname') ,
          'mname' => request('mname') ,
          'lname' => request('lname') ,
          'email' => request('email') ,
          'password' => bcrypt(request('password')) ,
          'type_id' => request('status') ,
          'balance' => 2000,
          'stateBlock' => 8,
          'image' => 'img-1.jpg',
          'remember_token' => $remember, 
        ]);

         return redirect('/indexAnyUser');
    }

}
