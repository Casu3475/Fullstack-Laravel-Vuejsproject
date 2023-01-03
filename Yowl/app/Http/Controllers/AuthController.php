<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Creation;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
        ]);
    }

    public function register(StoreUserRequest $request)
    {

        $request->validated($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth
        ]);
        $accountCreated = Creation::create([
            'user_id' => $user->id
        ]);

        event(new Registered($user));
        
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken,
            'AccountCreated' => $accountCreated
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have been successfully log out and your token has been removed.'
        ]);
    }

    //recuperation de user ID 
    public function id_from_token(Request $request, $usertoken)
    {
        // $id = Auth::id();
        $token = PersonalAccessToken::findToken($usertoken);

        echo($token);
        $user_id = DB::table('personal_access_tokens')
            ->selectRaw('tokenable_id')
            ->where('token', ($token))
            ->first(); 
        
        $user_id_def = $user_id->tokenable_id;

        return $user_id_def;
    }

    // public function get_user_data(Request $request, $usertoken)
    // {
        
    //     $token = PersonalAccessToken::findToken($usertoken);

    //     echo($token);
    //     $user_id = DB::table('personal_access_tokens')
    //         ->selectRaw('tokenable_id')
    //         ->where('token', ($token))
    //         ->first(); 
        
    //     $user_id_def => $request->tokenable_id;



    //     return $user_id_def;
    // }
}
