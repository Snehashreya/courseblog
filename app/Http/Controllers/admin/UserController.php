<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function adduser()
    {
        return view('admin.user.adduser');
    }
    public function saveuser(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_as = $request->input('role_as');
        $user->save();

        Session::flash('statuscode','success');
        return redirect('regusers')->with('status','User added successfully');
    }

    public function edituser($id)
    {
        $users = User::find($id);
        return view('admin.user.edituser',compact('users'));
    }

    public function updateuser(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_as = $request->input('role_as');
        $user->update();

        Session::flash('statuscode','success');
        return redirect('regusers')->with('status','User updated successfully');
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('statuscode','error');
        return redirect('regusers')->with('status','User deleted successfully');
    }

    public function blockuser($id)
    {
        $userblock = User::find($id);

        if($userblock)
        {
            if(Auth::check() && Auth::user()->isban)
            {
                $banned = Auth::user()->isban == "1"; // "1"= user is banned / "0"= user is unBanned
                Auth::logout();

                if ($banned == 1) {
                    $message = 'Your account has been Banned. Please contact administrator.';
                }
                return redirect()->route('login')
                    ->with('status',$message)
                    ->withErrors(['email' => 'Your account has been Banned. Please contact administrator.'])
                ;
            }
        }


    }
}
