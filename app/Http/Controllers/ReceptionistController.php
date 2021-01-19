<?php

namespace App\Http\Controllers;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReceptionistController extends Controller
{
    public function availableRooms()
    {
        $rooms = room::all();

       return view('AnyUsersAdvancedPages.Pages.Receptionist.Rooms', compact('rooms'));
    }


    public function SearchRooms($roomtype = 0 , $adult = 0)
    {
        if($roomtype==0 && $adult == 0){

            $rooms = room::all();
        }else if($roomtype!=0 && $adult != 0){

            $rooms = room::where([
                ['roomtype_id' ,'=' ,$roomtype ],
                ['MaximumPerson' ,'=' ,$adult],
                ['state_id' ,'=' ,1],
                ['state_clean_id' ,'=' ,5],
            ])->get();
        }else if($roomtype!=0 && $adult == 0)
        {
            $rooms = room::where([
                ['roomtype_id' ,'=' ,$roomtype ],
                ['state_id' ,'=' ,1],
                ['state_clean_id' ,'=' ,5],
            ])->get();
        }else if($roomtype==0 && $adult != 0)
        {
            $rooms = room::where([
                ['MaximumPerson' ,'=' ,$adult],
                ['state_id' ,'=' ,1],
                ['state_clean_id' ,'=' ,5],
            ])->get();
        }
        // Fetch all records
        $roomData['data'] = $rooms;

        echo json_encode($roomData);
        exit;
    }


}
