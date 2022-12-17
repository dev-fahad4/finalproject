<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctors;

class homePageController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function showDoctors()
    {
        $doctorData=doctors::all();
        return view("showDoctors", compact("doctorData"));
    }

    public function showContacts()
    {
        return view("showContacts");
    }
}
