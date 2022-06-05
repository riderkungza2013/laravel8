<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //
    public function token(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // throw ValidationException::withMessages(
                return [
                'email' => ['The provided credentials are incorrect.'],
                ];
        // );
        }

        return ['token'=>$user->createToken($request->device_name)->plainTextToken];
    }

    public function register(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ( $user ) {
            // throw ValidationException::withMessages(
            return    [
                'email' => ['The email is already in use.'],
            ];
        // );
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // return $user->createToken($request->device_name)->plainTextToken;
        return ['token'=>$user->createToken($request->device_name)->plainTextToken];
        // return ["status"=>"success"];
       
    }
}
