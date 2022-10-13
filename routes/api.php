<?php

use App\Http\Controllers\MemberAppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Member;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate([
       
//         'device_name' => 'required',
//     ]);
//     $user = Member::latest()->first();
 
 
//      $token= $user->createToken($request->device_name)->plainTextToken;
//      $response =[
//         'token'=>$token
//      ];
    
//      return response($response,201);

// });




Route::post('/get-member', [MemberAppController::class, 'getMember']);
Route::get('/get-position/{id}', [MemberAppController::class, 'getPosition']);

Route::post('/agm-registration', [MemberAppController::class, 'agmRegistration']);
//  Route::middleware('auth:sanctum')->group(function () { 
// });
