<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }

    protected function redirectTo($request){    
        if (! $request->expectsJson()) {        
            $user = User::find($request->id);

            // Make sure you've got the Page model
            if($user) {
                $user->email_verified_at = now();
                $user->save();
            }
            return url('http://127.0.0.1:5173' . '/login');    
        }
    }
}
