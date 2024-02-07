<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserRegister;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ModuleController;



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

// Route::group(['middleware' => 'auth:sanctum'], function(){
//    end data --<
    Route::get("subjects/course/{courseId}",[SubjectController::class,'findSubjectsByCourse']);
    Route::get("modules/subject/{subjectId}",[ModuleController::class,'findModuleBySubject']);
    Route::get("modules/file/{fileId}",[ModuleController::class,'findModuleByFile']);
//    -->
    Route::apiResource("post",FormController::class);
    Route::apiResource("admin",AdminController::class);
    Route::post("upload",[FileUploadController::class,'upload']);
    Route::apiResource("subject",SubjectController::class);
    Route::apiResource("course",CourseController::class);
    Route::apiResource("module",ModuleController::class);




// });



Route::post("login",[UserController::class,'index']);
Route::post("adminlogin",[AdminController::class,'index']);
Route::apiResource("userregister",UserRegister::class);




