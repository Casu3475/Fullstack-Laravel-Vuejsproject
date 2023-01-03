<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// // Verify email
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// // Resend verification email
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/setup', function(){
//     $credentials=[
//         'email'=> 'admin@admin.com',
//         'password'=>'password'
//     ];

//     if (!Auth::attempt($credentials)){
//         $user = new \App\Models\User();

//         $user->name = 'Admin';
//         $user->email = $credentials['email'];
//         $user->password = Hash::make($credentials['password']);

//         $user->save();

//         if(Auth::attemp($credentials)){
//             $user = Auth::user();

//             $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
//             $updateToken = $user->createToken('update-token', ['create', 'update']);
//             $basicToken = $user->createToken('basic-token');

//             return[
//                 'admin'=>$adminToken->plainTextToken,
//                 'update'=>$updateToken->plainTextToken,
//                 'basic'=>$basicToken->plainTextToken,
//             ];
//         }
//     }
// });
