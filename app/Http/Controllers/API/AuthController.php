<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //register
    public function registeruser(Request $request){
        
         

         try {
            //code...
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:4',
                'email' => 'required|unique:users|email:rfc,dns',
                'password'   => 'required|min:4',
                 
             ]);
    
             if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'error' => $validator->errors()
                ],422);
             }
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password'   => Hash::make($request->password),
                ]);
    
                return response()->json([
                    'status' => True,
                    'message' => 'Register User',
                    'data' => $user,
                    'token' => $user->createToken("API Token User")->plainTextToken
                ],200); 
    
         } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => False,
                'message' => 'Register Failed '.$th->getMessage(),
               
            ],422); 

         }
    }

    public function loginuser(Request $request)
    {
        try {
            //code...
             $validator = Validator::make($request->all(), [
                // 'name' => 'required|min:4',
                'email' => 'required|email:rfc,dns',
                'password'   => 'required|min:4',
                 
             ]);
             if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'error' => $validator->errors()
                ],422);
             }

              //logic auth
        if (!Auth::attempt($request->only(['email','password']))) {
            
            
            return response()->json([
                'status' => false,
                'message' => 'Username dan Password tidak sesuai!',
            ],401);
        }

        $user = User::where('email',$request->email)->first();
        return response()->json([
            'status' => True,
            'message' => 'Login User Berhasil',
            'data' => $user,
            'token' => $user->createToken("API Token User")->plainTextToken
        ],200); 

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => False,
                'message' => 'Register Failed'.$th->getMessage(),
               
            ],422); 
        }
    }

    public function logout(Request $request)
    {
        // Auth::user()->tokens()->delete();
        $user = $request->user();

        // Revoke all tokens...
        // $user->tokens()->delete();
 
        // Revoke the token that was used to authenticate the current request...
        // $request->user()->currentAccessToken()->delete();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        // dd($user);
        // Revoke a specific token...
        // $user->tokens()->where('id', $tokenId)->delete();


        return response()->json([
            'status' => True,
            'message' => 'Logout Berhasil'
        ],200);
    }
}
