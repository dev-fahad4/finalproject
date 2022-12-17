<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\pharmacies;
use App\Models\carts;

class pharmaciesController extends Controller
{
    public function showMediList($sortBy)
    {
        
        if(empty($sortBy) or $sortBy == 'Default')   
            $mediData=pharmacies::all(); //auto sorted(by def ascending) based on id (ambulance id in the displayed table)
        elseif($sortBy == 'Booked') //booked means availablity = False hence 0
            $mediData=pharmacies::all()->sortBy('medicine_name');
        elseif($sortBy == 'Available') //available means availablity = True hence 1
            $mediData=pharmacies::all()->sortByDesc('medicine_name');
        else
            echo('error while sorting in showMediList function inside patient controller. Function code begins: Line 10');

        return view('showMediList', compact("mediData","sortBy"));
    }

    public function addMedi()
    {
        $data=$_GET;
        $u_id = Auth::User()->id;
        $cartData=new carts;
        
        $cartData->user_id=Auth::User()->id;
        $cartData->medicine_id=$data["medicine_id"];
        $cartData->medicine_name=$data["medicine_name"];
        $cartData->medicine_amount=$data["medicine_amount"];
        $cartData->unit_price=$data["unit_price"];
        $cartData->medicine_unitized_price=$data["medicine_amount"]*$data["medicine_price"];
        $cartData->save();

        $mediData = pharmacies::whereid($data["medicine_id"])->first();
        $mediData->medicine_count=$mediData->medicine_count-$data["medicine_amount"];
        if($mediData->medicine_count <= 0)
            $mediData->availability=0;
        $mediData->save();
        
        $sortBy = $data["sortBy"];

        if($sortBy == 'Default')   
            $mediData=pharmacies::all(); //auto sorted(by def ascending) based on id (ambulance id in the displayed table)
        elseif($sortBy == 'Booked') //booked means availablity = False hence 0
            $mediData=pharmacies::all()->sortBy('medicine_name');
        elseif($sortBy == 'Available') //available means availablity = True hence 1
            $mediData=pharmacies::all()->sortByDesc('medicine_name');
        else
            echo('error while sorting in showMediList function inside patient controller. Function code begins: Line 26');

        return view('showMediList', compact("mediData","sortBy"));
    }

    public function showCart($sortBy)
    {
        
        $u_id = Auth::User()->id;

        if(empty($shortBy) or $sortBy == 'Default')   
            $cartData=carts::all(); //auto sorted(by def ascending) based on id (ambulance id in the displayed table)
        elseif($sortBy == 'Booked') //booked means availablity = False hence 0
            $cartData=carts::all()->sortBy('medicine_name');
        elseif($sortBy == 'Available') //available means availablity = True hence 1
            $cartData=carts::all()->sortByDesc('medicine_name');
        else
            echo('error while sorting in showMediList function inside patient controller. Function code begins: Line 10');

        $total = 0;

        foreach ($cartData as $data)
        {
            if ($data->user_id==$u_id)
                $total = $total+ $data->medicine_unitized_price;
        }

        return view('showCart', compact("cartData","sortBy","total"));
    }

    public function removeCartItem($id, $sortBy)
    {
        
        $cartData = carts::find($id);

        $mediData=pharmacies::whereid($cartData->medicine_id)->first();
        $mediData->medicine_count=$mediData->medicine_count+$cartData->medicine_amount;
        $mediData->Availability=1;
        $mediData->save();
        $cartData->delete();

        $cartData=carts::all();

        return redirect()->back();
    }

    public function paymentForm($total)
    {
        $userData=Auth::User();
        return view("paymentForm", compact("total","userData"));
    }

    public function paymentDone()
    {
        $u_id=Auth::User()->id;

        $cartData=carts::all();
        foreach ($cartData as $data)
        {
            $temp = carts::whereuser_id($u_id)->first();
            
            if($temp == NULL)
                break;
            else
                $temp->delete();

        }

        $u_id = Auth::User()->id;

        if(empty($shortBy) or $sortBy == 'Default')   
            $cartData=carts::all(); //auto sorted(by def ascending) based on id (ambulance id in the displayed table)
        elseif($sortBy == 'Booked') //booked means availablity = False hence 0
            $cartData=carts::all()->sortBy('medicine_name');
        elseif($sortBy == 'Available') //available means availablity = True hence 1
            $cartData=carts::all()->sortByDesc('medicine_name');
        else
            echo('error while sorting in showMediList function inside patient controller. Function code begins: Line 10');

        $total = 0;

        foreach ($cartData as $data)
        {
            if ($data->user_id==$u_id)
                $total = $total+ $data->medicine_unitized_price;
        }
        $sortBy = 'Default';

        return view('showCart', compact("cartData","sortBy","total"));
    }
}
