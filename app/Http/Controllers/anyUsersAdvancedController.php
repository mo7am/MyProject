<?php

namespace App\Http\Controllers;
use App\Traits\userTraits;
use Illuminate\Http\Request;
use App\Models\room;
use DB;
use App\Models\staff;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Validator;
use Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



use Illuminate\Support\Facades\Input;


class anyUsersAdvancedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexAnyUserAdvanced ()
    {

       /* $role = Role::create(['name' => 'Manager']);
        $role1 = Role::create(['name' => 'Receptionist']);
        $role2 = Role::create(['name' => 'Acountant']);
        $role3 = Role::create(['name' => 'Housekeaping']);
        $role4 = Role::create(['name' => 'Cheif']);
        $role5 = Role::create(['name' => 'localguest']);
        $role6 = Role::create(['name' => 'foreignguist']);*/
       // $permission = Permission::create(['name' => 'test']);

       /* $role = Role::find(2);
        $permission = Permission::find(2);


        $role->givePermissionTo($permission);*/

          //  Auth::user()->assignRole('Receptionist');

       // Auth::user()->givePermissionTo('test');

        return view ('AnyUsersAdvancedPages.Pages.index');
    }

    public function indexReceptionist ()
    {
        return view ('AnyUsersAdvancedPages.Pages.indexReceptionist');
    }



}
