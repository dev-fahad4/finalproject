<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\appointments;
use App\Models\doctors;

class patientController extends Controller
{
    public function showAppointmentList($filterBy)
    {
        $u_id = Auth::User()->id;
        $searchData = "";

        if($filterBy == 'Available')
            $appointData = appointments::whereuser_id(0)->get();
        elseif($filterBy == "Booked")
            $appointData = appointments::where("user_id","!=",0)->get();
        elseif($filterBy == "My Appointment")
            $appointData = appointments::whereuser_id($u_id)->get();
        else
            $appointData = appointments::all();

        $doctorData = doctors::all();
        
        $notFound = 0;

        return view('showAppointmentList',compact('appointData','doctorData','filterBy','notFound','searchData'));

    }

    public function bookAppointment($id)
    {   
        $appointData = appointments::whereid($id)->first();
        $appointData->user_id=Auth::User()->id;
        $appointData->save();

        return redirect()->back();
    }

    public function cancelAppointment($id)
    {   
        $appointData = appointments::whereid($id)->first();
        $appointData->user_id=0;
        $appointData->save();

        return redirect()->back();
    }

    public function searchAppointment()
    {
        $dName=$_GET;
        $notFound=0;
        $appointData="none";
        $searchData=$dName['dName'];

        $doctorData = doctors::wherename($dName['dName'])->get(); //it returns a of 2d array
        
        if(empty($doctorData[0]))
            $notFound=1;
        else
            $appointData = appointments::wheredoctor_id($doctorData[0]->id)->get();

        $filterBy = "All";  

        return view('showAppointmentList',compact('appointData','doctorData','filterBy',"notFound",'searchData'));
    }
}
