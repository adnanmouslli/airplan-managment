<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function index(Request $request){


        $ipGlobal = "http://127.0.0.1:8000/";
        $ce = $request->ce ;
       

        $msgError = [
            "The email uncurrect" ,
            "The password uncurrect"
        ];


        $user = Auth::user();

        if(isset($ce))
            return view("user.profile.index" , ["user" => $user, "ip"=>$ipGlobal , "msgError" => $msgError[(int)$ce]]);
        else 
          return view("user.profile.index" , ["user" => $user , "ip"=>$ipGlobal]);

    }

    function edit(){
        $user = Auth::user();

        return view("user.profile.editProfile" , ["user" => $user]);
    
    }

    function update(Request $request){
        
        $user = $request->only("name" , "email" , "address" , "phone");
        
        $id = $request->id;
     

        User::find($id)->update($user);

        return redirect()->route("profile.index");

    }


    function editPassword() {
       
        return view("user.profile.changePassword");
    }
    
    function updatePassword(Request $request){

        $data = $request->only("oldPassword" , "newPassword" , "email" );
        $id = $request->id;

        if($data["email"] != Auth::user()->email){
            return redirect()->route("profile.index" , ["ce" => 0]);
        }

        if(!Hash::check($data["oldPassword"] , Auth::user()->getAuthPassword())){
            return redirect()->route("profile.index" , ["ce" => 1]);
        }

       $user = User::find($id);
       $user->password = Hash::make($data["newPassword"]);
       $user->save();

       return redirect()->route("profile.index");
    
    }


    
}