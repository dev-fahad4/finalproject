<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ambulances;
use App\Models\hospital_rooms;

class receptionistController extends Controller
{
    public function showPatientList()
    {
        $data=User::all();
        return view('showPatientList', compact("data"));
    }

    public function showAmbuList($sortBy)
    {
        if($sortBy == 'Default')   
            $ambuData=ambulances::all(); //auto sorted(by def ascending) based on id (ambulance id in the displayed table)
        elseif($sortBy == 'Booked') //booked means availablity = False hence 0
            $ambuData=ambulances::all()->sortBy('availability');
        elseif($sortBy == 'Available') //available means availablity = True hence 1
            $ambuData=ambulances::all()->sortByDesc('availability');
        else
            echo('error while sorting in showAmbuList function inside recep controller. Function code begins: Line 17');

        return view('receptionist.showAmbuList', compact("ambuData","sortBy"));
    }

    public function bookAmbu($data,$sortBy)
    {
        $target_ambu=ambulances::find($data);
        $patientData=User::all();
        return view('showPatientList', compact("data","patientData","sortBy"));
    }
    
    public function bookingAmbuDone($ambu_id,$p_id,$sortBy)
    {
        $target_ambu=ambulances::find($ambu_id);
        $target_ambu->user_id = $p_id;
        $target_ambu->availability=false;
        $target_ambu->save();
        
        $ambuData=ambulances::all();
        return view('receptionist.showAmbuList', compact("ambuData","sortBy"));
    }
    
    public function cancelAmbuBook($ambu_id,$sortBy)
    {
        $target_ambu=ambulances::find($ambu_id);
        $target_ambu->user_id=0;
        $target_ambu->availability=true;
        $target_ambu->save();

        $ambuData=ambulances::all();
        return view('receptionist.showAmbuList', compact("ambuData","sortBy"));
    }
    
    public function showRoomList($sortBy)
    {
        if($sortBy == 'Default')   
            $roomData=hospital_rooms::all(); //auto sorted(by def ascending) based on id (room id[nt room number] in the displayed table)
        elseif($sortBy == 'Booked') //booked means availablity = False hence 0
            $roomData=hospital_rooms::all()->sortBy('availability');
        elseif($sortBy == 'Available') //available means availablity = True hence 1
            $roomData=hospital_rooms::all()->sortByDesc('availability');
        else
            echo('error while sorting in showRoomList function inside recep controller. Function code begins: Line 17');
        
        return view('receptionist.showRoomList', compact("roomData","sortBy"));
    }

    public function bookRoom($room_id,$sortBy)
    {
        $data = $room_id;
        $target_rooms=hospital_rooms::find($data);
        $patientData=User::all();
        return view('showPatientList', compact("data","patientData","sortBy"));
    }

    public function bookingForm($room_id,$p_id,$sortBy)
    {
        $patientData=User::find($p_id);
        return view('receptionist.bookingForm', compact("room_id","patientData","sortBy"));
    }

    public function bookingRoomDone()
    {
        /* we are using "where"(structure-> where+ColumnName) instead of "find" bcz in "find" the data we pass is automatically
           assumed as the data of id-column. But if we want to access other columns then one of the way is to use "where". 
        */
        $data=$_GET; //$_GET returns an array which has all the valuse from form tag which wsa routed here
        $target_room=hospital_rooms::whereroom_number($data["room_number"])->first();
        $target_room->booking_time = $data["date"];
        $target_room->user_id = $data["p_id"];
        $target_room->availability=false;
        $target_room->save();
        
        $roomData=hospital_rooms::all();

        $sortBy="Default";
        return view('receptionist.showRoomList', compact("roomData","sortBy"));
    }

    public function cancelRoomBook($room_id,$sortBy)
    {
        /* we are using "where"(structure-> where+ColumnName) instead of "find" bcz in "find" the data we pass is automatically
           assumed as the data of id-column. But if we want to access other columns then one of the way is to use "where". 
        */
        $target_room=hospital_rooms::whereroom_number($room_id)->first();
        $target_room->user_id=0;
        $target_room->booking_time= "0001-01-01";
        $target_room->availability=true;
        $target_room->save();
        
        $roomData=hospital_rooms::all();
        return view('receptionist.showRoomList', compact("roomData","sortBy"));
    }

    
}
