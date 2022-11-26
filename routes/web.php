<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PlaceCulController;
use App\Http\Controllers\PlaceMedController;
use App\Http\Controllers\PlaceRelController;
use App\Http\Controllers\PlaceLeisController;
//Hasan 2022 edited this!


// Route::get('/all',[Controller::class,'store']);
// Route::get('/storeBlogadmin',[Controller::class,'storeBlogadmin']);

Route::controller(Controller::class)->group(function(){
Route::post('/admin/storeLeis','store');
Route::post('/admin/storeMed','store');
Route::post('/admin/storeRel','store');
Route::post('/admin/storeCul','store');

Route::post('/admin/updateRel/{id}','update');
Route::post('/admin/updateCul/{id}','update');
Route::post('/admin/updateLeis/{id}','update');
Route::post('/admin/updateMed/{id}','update');
// Route::post('/admin/storeBlog','adminstoreBlog');

Route::get('/searchRel','search');
// Route::get('/searchCul','search');
// Route::get('/searchLeis','search');
// Route::get('/searchMed','search');

Route::get('/addBlog','addBlog');

});


Route::get('/', function () {
    return view('user.index');
});

Route::get('/BookNow', function () {
    return view('user.BookNow');
});

Route::get('/Myreservations', function () {
    return view('user.Myreservations');
});


// Route::get('/Reservations','reserve']);

// Route::get('/Ticket', function () {
//     return view('user.Ticket');
// });


// ----------Religious----------------------------

Route::controller(PlaceRelController::class)->group(function(){

Route::get('/admin/dashboards','dashboards');
Route::get('/admin/createRel','create');
Route::get('/ReligiousDashboard','showReligious');
Route::get('/ReligiousTours','showRelTours');
Route::delete('/admin/deleteRel/{id}','destroy');
Route::get('/admin/editRel/{id}','edit');
// Route::post('/admin/updateRel/{id}','update');
Route::get('/admin/restoreRel/{id}','restore');
// Route::get('/searchRel','search');
Route::post('CustomersRes','CustomersRes');
Route::post('/admin/storeRel','store');


});


// -----------Cultural-----------------------------

Route::controller(PlaceCulController::class)->group(function(){

Route::get('/admin/createCul','create');
Route::get('/CulturalDashboard','showCultural');
Route::get('/CulturalTours','showCulTours');
Route::delete('/admin/deleteCul/{id}','destroy');
Route::get('/admin/editCul/{id}','edit');
// Route::post('/admin/updateCul/{id}','update');
Route::get('/admin/restoreCul/{id}','restore');
// Route::get('/searchCul','search');
});

// -----------Leisure-----------------------------

Route::controller(PlaceLeisController::class)->group(function(){

Route::get('/admin/createLeis','create');
// Route::post('/admin/storeLeis','store');
Route::get('/LeisureDashboard','showLeisure');
Route::get('/LeisureTours','showLeisTours');
Route::delete('/admin/deleteLeis/{id}','destroy');
Route::get('/admin/editLeis/{id}','edit');
// Route::post('/admin/updateLeis/{id}','update');
Route::get('/admin/restoreLeis/{id}','restore');
// Route::get('/searchLeis','search');
});



// -----------Medical-----------------------------

Route::controller(PlaceMedController::class)->group(function(){

        Route::get('/admin/createMed','create');
        Route::get('/MedicalDashboard','showMedical');
        Route::get('/MedicalTours','showMedTours');
        Route::delete('/admin/deleteMed/{id}','destroy');
        Route::get('/admin/editMed/{id}','edit');
        // Route::post('/admin/updateMed/{id}','update');
        Route::get('/admin/restoreMed/{id}','restore');
        // Route::get('/searchMed','search');

        });

// Route::get('/MedicalDashboard',[PlaceMedController::class,'showMedical']);
//-------------------------------------------------------------------------------------------

Route::controller(AuthController::class)->group(function(){
Route::get('/signup','signup');
Route::post('/register','register');
Route::post('/login','login');
Route::get('logout','logout');
Route::get('admin/index','index');
Route::get('Myprofile','Myprofile');
Route::post('updatemyprofile/{id}','updatemyprofile');

});

// ----------------------------------------------------
// -----------Blog-----------------------------

Route::controller(BlogController::class)->group(function(){

Route::get('/admin/createBlog','create');
// Route::post('/admin/storeBlog','storeBlog');
Route::get('/BlogDashboard','showBlog');
Route::delete('/admin/deleteblog/{id}','destroy');
Route::get('/admin/editBlog/{id}','edit');
Route::post('/admin/updateBlog/{id}','update');
Route::get('/admin/restoreBlog/{id}','restore');
Route::get('/searchCul','search');
Route::get('showcheckbox','showcheckbox');
Route::post('checkbox','checkbox');
// Route::get('/edit_status','edit_status');

Route::post('/storeBlog','storeBlog');

// Route::post('/admin/storeBlog','storeBlog');

Route::get('/BlogDashboard','BlogDashboard');
Route::get('/BlogsHome','BlogsHome');
Route::post('/editstatus/{id}','editstatus');

// Route::get('/showBlogDashboard','showBlogDashboard');


});

// Route::post('/BlogD','storeBlogadmin');



Route::get('/Myprofile',[BlogController::class,'showuserProfile']);

Route::get('/Bdash', [BlogController::class,'dashboards']);



Route::get('/login', function () {
    return view('user.login');
});


