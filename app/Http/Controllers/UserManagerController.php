<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagerController extends Controller
{
    public function index(){
        $users = User::orderBy('id','desc')->paginate(7);
        return view('userManager.index', compact('users'));
    }
    public function info($id){
        $user = User::find($id);
        return view('userManager.info', compact('user'));
    }
    public  function makeAdmin($id){
        $user = User::find($id);
        if($user->role != 0){
            $user->role = "0";
            $user->update();
            return redirect()->route('user.manager')->with('toast',['icon'=>'success','title'=>'Successfully make Admin.']);
        }
    }
    public  function unmakeAdmin($id){
        $user = User::find($id);
        if($user->role != 1){
            $user->role = "1";
            $user->update();
            return redirect()->route('user.manager')->with('toast',['icon'=>'success','title'=>'Successfully unmake Admin.']);
        }
    }

    public  function banUser($id){
        $user = User::find($id);
        if($user->isBanned != 1){
            $user->isBanned = "1";
            $user->update();
            return redirect()->back()->with('toast',['icon'=>'success','title'=>"Successfully Ban $user->name."]);
        }
    }
    public  function unbanUser($id){
        $user = User::find($id);
        if($user->isBanned != 0){
            $user->isBanned = "0";
            $user->update();
            return redirect()->back()->with('toast',['icon'=>'success','title'=>"Successfully remove ban list $user->name."]);
        }
    }
}
