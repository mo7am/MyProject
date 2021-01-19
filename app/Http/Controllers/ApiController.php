<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room;
use DB;
use App\Models\staff;
use App\Models\User;

use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class ApiController extends Controller
{
   public function index()
   {
    	$users = User::get();

    	return response()->json($users);
   }
}
