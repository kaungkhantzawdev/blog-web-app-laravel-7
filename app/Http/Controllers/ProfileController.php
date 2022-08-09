<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.profile');
    }

    public function photoUpload(){
        return view('profile.photoUpload');
    }
    public function updateInfo(){
        return view('profile.updateInfo');
    }
    public function changeP(){
        return view('profile.changePassword');
    }
    public function upload(Request $request){
        $request->validate([
            'photo' => 'required|mimes:jpeg,jpg,png'
        ]);
        $dir = "public/profile/";
        Storage::delete($dir.Auth::user()->photo);
        $file = $request->file('photo');
        $newName = uniqid()."_profile.".$file->getClientOriginalExtension();
        $file->storeAs($dir, $newName);
        $user = User::find(Auth::id());
        $user->photo = $newName;
        $user->update();
        return redirect()->route('profile')->with("toast",["icon"=>"success","title"=>"Upload & updated your photo."]);
    }
    public function updatePa(Request $request){
        $request->validate([
            'phone'=>'required|numeric',
            'address'=>'required|min:5|max:100'
        ]);
        $user = Auth::user();
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();
        return redirect()->route('profile')->with('toast',['icon'=>'success','title'=>'Your info is successfully added.']);
    }
    public function updateNe(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:50',
            'email'=>'required|email'
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        return redirect()->route('profile')->with('toast',['icon'=>'success','title'=>'Your info is successfully added.']);
    }
    public function changePassword(Request $request){
        $request->validate([
            'current_password'=>['required', new MatchOldPassword()],
            'new_password'=>['required'],
            'new_confirm_password'=>['same:new_password'],
        ]);

        $currentUser = Auth::user();
        $currentUser->password = Hash::make($request->new_password);
        $currentUser->update();
        Auth::logout();
        return redirect()->route('login')->with('toast',['icon'=>'success', 'title'=>'Change Password is successfully.']);
    }

}
