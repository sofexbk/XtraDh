<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function register(Request $request){
    //     $fields = $request->validate([
    //         'name' => 'string|required',
    //         'email' =>'required|email|unique:users,email',
    //         'password' =>'string|confirmed|required'
    //     ]);
    //     $user = User::create([
    //         'name' =>$fields['name'],
    //         'email' =>  $fields['email'],
    //         'password'=>bcrypt($fields['password'])
    //     ]);
    //     $token = $user->createToken('MyAppToken')->plainTextToken;
    //     $response= [
    //         'user'=>$user,
    //         'token' =>$token
    //     ];
    //     return response($response,202);
    // }

    public function login(Request $request){
        $fields = $request->validate([
            'email' =>'required|email',
            'password' =>'string|required'
        ]);
                
        //check email
            $user = User::where('email',$fields['email'])->first();
        //check password
        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'message' => 'Email or Password are incorrect'
            ],404);
        }


                $token = $user->createToken('MyAppToken')->plainTextToken;
                $response= [
                    'user'=>$user,
                    'token' =>$token
                ];
                return response($response,202);


       
        
    }


<<<<<<< HEAD
public function userProfile(){
    return response()->json(auth()->user());
=======
    public function logout(Request $request)
{
    $user = auth()->user();

<<<<<<< HEAD
    if ($user) {
        $user->tokens()->delete();
=======




    public function logout(Request $request){

        auth()->logout();        
>>>>>>> origin
        return [
            'message' => 'Logged out'
        ];
    }
    return [
        'message' => 'user not logged'
    ];


}


>>>>>>> c8116af27f105e461a2c1b492aa4ed6e048db4f3
}

    public function logout(Request $request){
        auth()->logout();
        return [
            'message' =>'Logged out'];
}}

