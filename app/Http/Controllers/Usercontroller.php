<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Validation\ValidationException; 

class Usercontroller extends Controller
{
   


    //
    public function login(Request $request)
    { $request->validate([
        'email' => 'required',
        'password' => 'required|min:5|max:12',
    ]);
       $user = User::where('email','=',$request->email)->first();
            // if(!$user || !Hash::check($request->password,$user->password))
            // {
            //     return "user and password not match.";
            // }else{
            //     $request->session()->put('user',$user);
            //     return redirect('/product');
            // }
            if($user){  
                if(Hash::check($request->password,$user->password)){
    
                    $request->session()->put('user',$user);
                    return redirect('/product');
    
                }else{
    
                    return back()->with('fail','password not matches.');
                }
    
            }else{
                return back()->with('fail',"This email is not registered.");
            }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        $user = new User;
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        $user->save();
        return redirect('/login');

    }

}