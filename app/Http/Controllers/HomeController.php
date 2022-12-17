<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\todo_lists;
use Illuminate\Support\Facades\Hash;

$flag = False;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
       
        if (Auth::ID())
        { 
            
            if (Auth::User()->role=="a")
            {
                $todoData = todo_lists::whereuser_id(Auth::User()->id)->get();
                return view('admin.home', compact("todoData"));
            }
            elseif (Auth::User()->role=="r")
            {   
                $todoData = todo_lists::whereuser_id(Auth::User()->id)->get();
                return view('receptionist.home', compact("todoData"));
            }
            else{
                return view('patient.home');
            }
            
        }
        else{
            return index()->back();
        }
    }

    public function addTodoListData()
    {
        $todo=$_GET;
        
        $todoData = new todo_lists;
        $todoData->user_id=Auth::User()->id;
        $todoData->todo=$todo["todo"];
        $todoData->done=0;
        $todoData->save();
        return redirect()->back();

    }

    public function doneNremoveTodoListData($id, $done)
    {
        $todoData = todo_lists::whereid($id)->first();

        if($done==1)
        {
            $todoData->done=1;
            $todoData->save();
        }
        elseif($done==0)
        {
            $todoData->delete();
        }
        else
        {
            $todoData->done=0;
            $todoData->save();
        }

        return redirect()->back();
    }

    public function showProfile()
    {

        $userData=User::find(Auth::User()->id);
        return view("showProfile",compact("userData"));
    }

    public function updateProfile()
    {
        $userData = $_GET;
        $user=User::find(Auth::User()->id);

        $user->name=$userData["name"];
        $user->email=$userData['email'];
        $user->contact_number=$userData['contact'];
        $user->address=$userData['address'];
        if($userData['password'] != "")
            $user->password=Hash::make($userData['password']);
        $user->save();
        
        $userData=User::find(Auth::User()->id);
        return view("showProfile",compact('userData'));
    }
}
