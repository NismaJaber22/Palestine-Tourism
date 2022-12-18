<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\PlaceCulController;
use App\Http\Controllers\PlaceMedController;
use App\Http\Controllers\PlaceRelController;
use App\Http\Controllers\PlaceLeisController;


Route::get('/all',[Controller::class,'store']);


// // search filter
// Route::get('/search', function () {
//     return view('admin.dashboard.search');
// });

Route::get('/login', function () {
    return view('user.login');
});

Route::controller(Controller::class)->group(function(){
<<<<<<< HEAD
    Route::get('/','home');
    Route::post('/admin/store','store');
    Route::post('/admin/update/{id}','update');

    Route::get('/admin/dashboards','dashboards')->middleware('auth','is_admin');
    Route::post('/adminStoreBlog','adminStoreBlog');


    Route::delete('/admin/admindestroyblog/{id}','admindestroyblog');

    // admindestroyblog
=======
    Route::post('/admin/storeLeis','store');
    Route::post('/admin/storeMed','store');
    Route::post('/admin/storeRel','store');
    Route::post('/admin/storeCul','store');
    Route::post('/admin/updateRel/{id}','update');
    Route::post('/admin/updateCul/{id}','update');
    Route::post('/admin/updateLeis/{id}','update');
    Route::post('/admin/updateMed/{id}','update');
    Route::get('/searchRel','search');
    Route::get('/addBlog','addBlog');
    Route::get('/admin/dashboards','dashboards')->middleware('is_admin');
>>>>>>> d2af0258d7f47faa004d5267dd22f3d8999a4cde
});

// ----------Religious----------------------------
Route::controller(PlaceRelController::class)->group(function(){
    Route::get('/admin/createRel','create');
<<<<<<< HEAD
    Route::get('/ReligiousDashboard','showReligious')->middleware('auth');
=======
    Route::get('/ReligiousDashboard','showReligious')->middleware('is_admin');
>>>>>>> d2af0258d7f47faa004d5267dd22f3d8999a4cde
    Route::get('/ReligiousTours','showRelTours');
    Route::delete('/admin/deleteRel/{id}','destroy');
    Route::get('/admin/editRel/{id}','edit');
    Route::get('/admin/restoreRel/{id}','restore');
    Route::post('/admin/storeRel','store');
    Route::get('/Relsearch','Relsearch');
    Route::get('/CustomersRes','CustomersRes');
});

// -----------Cultural-----------------------------
Route::controller(PlaceCulController::class)->group(function(){
    Route::get('/admin/createCul','create');
    Route::get('/CulturalDashboard','showCultural')->middleware('is_admin');
    Route::get('/CulturalTours','showCulTours');
    Route::delete('/admin/deleteCul/{id}','destroy');
    Route::get('/admin/editCul/{id}','edit');
    Route::get('/admin/restoreCul/{id}','restore');
    Route::get('/Culsearch','Culsearch');
});

// -----------Leisure-----------------------------
Route::controller(PlaceLeisController::class)->group(function(){
    Route::get('/admin/createLeis','create');
    Route::get('/LeisureDashboard','showLeisure')->middleware('is_admin');
    Route::get('/LeisureTours','showLeisTours');
    Route::delete('/admin/deleteLeis/{id}','destroy');
    Route::get('/admin/editLeis/{id}','edit');
    Route::get('/admin/restoreLeis/{id}','restore');
    Route::get('/Leisearch','Leisearch');
});

// -----------Medical-----------------------------
Route::controller(PlaceMedController::class)->group(function(){
    Route::get('/admin/createMed','create');
    Route::get('/MedicalDashboard','showMedical')->middleware('is_admin');
    Route::get('/MedicalTours','showMedTours');
    Route::delete('/admin/deleteMed/{id}','destroy');
    Route::get('/admin/editMed/{id}','edit');
    Route::get('/admin/restoreMed/{id}','restore');

    Route::get('/Medsearch','Medsearch');

});

//------------AuthController---------------------------
Route::controller(AuthController::class)->group(function(){
    Route::get('/signup','signup');
    Route::post('/register','register');
    Route::post('/login','login');
    Route::get('logout','logout');
    Route::get('Myprofile','Myprofile');
    Route::get('/Myreservations','Myreservations');
    Route::post('updatemyprofile/{id}','updatemyprofile');
    Route::delete('deleteblog/{id}','destroy');
    Route::post('updateBlog/{id}','update');

    // Route::middleware(['auth', 'second'])->group(function () {
});


// -----------Blog-----------------------------
Route::controller(BlogController::class)->group(function(){
    Route::get('/admin/createBlog','create');
    Route::get('/BlogDashboard','showBlog');
    Route::delete('/admin/deleteblog/{id}','destroy');
    Route::get('/admin/editBlog/{id}','edit');
    Route::get('/admin/restoreBlog/{id}','restore');
    // Route::get('/searchCul','search');
    Route::get('showcheckbox','showcheckbox');
    Route::post('checkbox','checkbox');
    Route::post('/storeBlog','storeBlog');
    Route::get('/BlogDashboard','BlogDashboard')->middleware('is_admin');
    Route::get('/BlogsHome','BlogsHome');
    Route::post('/editstatus/{id}','editstatus');
    Route::post('/Myprofile','showuserProfile');
    Route::post('/Bdash','dashboards');
});

Route::controller(CommentController::class)->group(function(){
    Route::post('/addComment','createComment');

    // -------
    Route::get('/showconnent','showconnent');


});

Route::controller(ReserveController::class)->group(function(){
    Route::get('/BookNow/{id}','BookNow');
    Route::post('/reserve','reserve');
    Route::get('/Ticket/{id}','Ticket');
});


// Route::get('admin/profile', ['middleware' => 'is_admin', function()
// {
//     Route::get('/admin/dashboards','dashboards');

// }]);
