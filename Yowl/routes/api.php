<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ResponseController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Protected routes
// Route::group(['namespace' => 'App\Http\Controllers'], function () {
Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth:sanctum','verified']], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('responses', ResponseController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('likes', LikeController::class);
    Route::apiResource('reports', ReportController::class);
    Route::get("/creations", [CreationController::class, 'index']);
    Route::get("/closures", [ClosureController::class, 'index']);
    
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get("/id_from_token/{usertoken}", [AuthController::class, 'id_from_token']);
// Route::get("/get_user_data/{usertoken}", [AuthController::class, 'id_from_token']);

//Unprotected routes
Route::get("/responses", [ResponseController::class, 'index']);
Route::get("/users/{user}", [UserController::class, 'show']);
Route::get("/comments", [CommentController::class, 'index']);
Route::get("/categories", [CategoryController::class, 'index']);
Route::get("/likes", [LikeController::class, 'index']);
Route::get("/reports", [ReportController::class, 'index']);
Route::get("/responses/{response}", [ResponseController::class, 'show']);
Route::get("/comments/{comment}", [CommentController::class, 'show']);
Route::get("/categories/{category}", [CategoryController::class, 'show']);
Route::get("/likes/{like}", [LikeController::class, 'show']);
Route::get("/reports/{report}", [ReportController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/search/{q}', [CommentController::class, 'search']);

//Kpi's routes
       //Summary routes for front-office front-end
Route::get('/most_liked_comments/{long}', [KPIController::class, 'most_liked_comments']);
Route::get('/most_hated_comments/{long}', [KPIController::class, 'most_hated_comments']);
Route::get('/most_recent_comments/{long}', [KPIController::class, 'most_recent_comments']);
Route::get('/random_comment_pick/{long}', [KPIController::class, 'random_comment_pick']);
        //back-office
Route::get('/comments_per_category', [KPIController::class, 'comments_per_category']);
Route::get('/ranking_user_likes_sent/{long}', [KPIController::class, 'ranking_user_likes_sent']);
Route::get('/ranking_user_reports_sent/{long}', [KPIController::class, 'ranking_user_reports_sent']);
Route::get('/total_account', [KPIController::class, 'total_account']);
Route::get('/creations24h', [KPIController::class, 'creation']);
Route::get('/closures24h', [KPIController::class, 'closure']);
Route::get('/most_liked_users/{long}', [KPIController::class, 'most_liked_users']);
Route::get('/most_liked_categories/{long}', [KPIController::class, 'most_liked_categories']);
Route::get('/most_reported_categories/{long}', [KPIController::class, 'most_reported_categories']);
Route::get('/most_reported_users/{long}', [KPIController::class, 'most_reported_users']); 



// Verify email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
