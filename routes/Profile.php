
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\anyUsersController;
use App\Http\Controllers\anyUsersAdvancedController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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

Route::group(['prefix' => LaravelLocalization::setLocale(),'middelware' =>['localeSessionRedirect' , 'localizationRedirect' , 'localeViewPath'] ] , function() {



        Route::post('/updateprofileimage', [ProfileController::class, 'updateprofileimage'])->name('updateprofilepicture');
 //ajax
    Route::post('/updateimageprofile', [ProfileController::class, 'UpdateImageProfile'])->name('updateImageProfile');
    Route::post('/updatepassword', [ProfileController::class, 'updatepassword'])->name('updatepassword');
    Route::post('/updateProfileUser', [ProfileController::class, 'UpdateProfileUser'])->name('UpdateProfileUser');
    Route::get('/profile/{id?}/{offset?}', [ProfileController::class, 'profile'])->name('MyProfile');

    Route::get('/showmore/{skip?}', [ProfileController::class, 'showmore'])->name('showmore');

    Route::get('/showmoreformypost/{skip?}', [ProfileController::class, 'showmoreformypost'])->name('showmoreformypost');

/////////////////////////Posts///////////////////////////////////////////////

    route::get('getAllPosts', [ProfileController::class, 'getAllPosts'])->name('getAllPosts');
    Route::post('/postUpload',[ProfileController::class,'postStore'])->name('postStore');



    Route::get('/ajax_upload', 'ProfileController@getimage');

    Route::post('/ajax_upload/action', 'ProfileController@action')->name('ajaxupload.action');

//////////////////////////////////////////////////////////////////////////////



});
