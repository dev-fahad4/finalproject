<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\doctors;
use App\Models\receptionist_candidates;
use App\Models\doctor_applications;
use App\Models\carts;
use App\Models\pharmacies;
use App\Models\hospital_rooms;
use App\Models\ambulances;
use App\Models\appointments;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function recepList()
    {
        $recepData=User::all();
        return view('admin.showReceptionistList', compact("recepData"));
    }

    public function recepCandList()
    {
        $recepCandData=receptionist_candidates::all();
        return view('admin.showReceptionistCandList', compact("recepCandData"));
    }

    
    public function addRecep($id)
    {
        $recepCandData= receptionist_candidates::find($id);
        $user_table = new User;
        
        $user_table->role = "r";
        $user_table->name = $recepCandData->name;
        $user_table->email = $recepCandData -> email;
        $user_table->password =Hash::make("default");
        $user_table->contact_number = $recepCandData->contact_number;
        $user_table->address = $recepCandData->Address;
        $user_table->save();

        $recepCandData->delete();
        return redirect()->back();
    }

    public function removeRecep($id)
    {
        $recep=User::find($id);
        $recep->delete();

        return redirect()->back();
    }

    public function rejectRecepCand($id)
    {
        $recep=receptionist_candidates::find($id);
        $recep->delete();

        return redirect()->back();
    }

    public function doctorList()
    {
        $doctorData=doctors::all();
        return view('admin.showDoctorList', compact("doctorData"));
    }

    public function doctorCandList()
    {
        $doctorCandData=doctor_applications::all();
        return view('admin.showDoctorCandList', compact("doctorCandData"));
    }

    public function addDoctor($id)
    {
        $doctorCandData= doctor_applications::find($id);
        $doctor_table = new doctors;
        
        $doctor_table->name = $doctorCandData->name;
        $doctor_table->email = $doctorCandData -> email;
        $doctor_table->contact_number = $doctorCandData->contact_number;
        $doctor_table->Address = $doctorCandData->address;
        $doctor_table->Edu_details = $doctorCandData->edu_details;
        $doctor_table->save();

        $doctorCandData->delete();
        return redirect()->back();
    }
    
    public function removeDoctor($id)
    {
        $recep=doctors::find($id);
        $recep->delete();

        return redirect()->back();
    }

    public function rejectDoctorCand($id)
    {
        $doctorCandData= doctor_applications::find($id);

        $doctorCandData->delete();
        return redirect()->back();
    }

    public function showPatientList()
    {
        $data=User::all();
        return view('showPatientList', compact("data"));
    }

    public function removePatient($id)
    {
        $userData=User::find($id);
        $userData->delete();

        $userCartData=carts::whereuser_id($id)->get();

        foreach ($userCartData as $data) {
            $mediData=pharmacies::whereid($data->medicine_id)->first();
            $mediData->medicine_count=$mediData->medicine_count+$data->medicine_amount;
            $mediData->Availability=1;
            $mediData->save();
            $data->delete();
        }

        $userData=appointments::whereuser_id($id)->get();
        foreach ($userData as $data) {
                $data->user_id=0;
                $data->save();
        }

        $userData=ambulances::whereuser_id($id)->get();
        foreach ($userData as $data) {
            $data->user_id=0;
            $data->availability=1;
            $data->save();

        }

        $userData=hospital_rooms::whereuser_id($id)->get();
        foreach ($userData as $data) {
            $data->user_id=0;
            $data->booking_time= "0001-01-01";
            $data->availability=true;
            $data->save();

        }

        return redirect()->back();
    }
}
