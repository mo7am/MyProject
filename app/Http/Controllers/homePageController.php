<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class homePageController extends Controller
{


    
    //
    public function index ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.index');
    }
     public function about ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.about');
    }
     public function blog_single ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.blog_single');
    }
     public function blog ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.blog');
    }
     public function contact ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.contact');
    }
     public function restaurant ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.restaurant');
    }
     public function rooms_single ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.rooms_single');
    }
     public function rooms ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.rooms');
    }
     public function signup ()
    {
    	 return view ('homePageHotel.PagesHomePageHotel.signup');
    }



    

    
}
