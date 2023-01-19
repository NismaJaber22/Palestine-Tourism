<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\PlaceCulController;
use App\Http\Controllers\PlaceMedController;
use App\Http\Controllers\PlaceRelController;
use App\Http\Controllers\PlaceLeisController;

Route::get('/all',[Controller::class,'store']);

// // search filter
// Route::get('/search', function () {
//     return view('admin.dashboard.search');
// });

// Route::get('/login', function () {
//     return view('user.login');
// });


Route::controller(Controller::class)->group(function(){
    Route::get('/','home')->name('home');
    Route::post('/admin/store','store');
    Route::post('/admin/update/{id}','update');

    Route::get('/admin/dashboards','dashboards')->middleware(['auth','is_admin']);
    Route::post('/adminStoreBlog','adminStoreBlog');

    Route::delete('/admin/admindestroyblog/{id}','admindestroyblog');
    // admindestroyblog
});

// ----------Religious----------------------------
Route::controller(PlaceRelController::class)->group(function(){
    Route::get('/admin/createRel','create');
    Route::get('/ReligiousDashboard','showReligious')->middleware(['auth','is_admin']);
    Route::get('/ReligiousTours','showRelTours');
    Route::delete('/admin/deleteRel/{id}','destroy');
    Route::get('/admin/editRel/{id}','edit');
    Route::get('/admin/restoreRel/{id}','restore');
    Route::post('/admin/storeRel','store');
    Route::get('/Relsearch','Relsearch');
    Route::get('/citySearch','citySearch')->name('search.city');
    Route::get('/Religioussearch','searchToures');
    Route::get('/CustomersResrel/{id}','CustomersRes');


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
    Route::get('/Culturalsearch','searchToures');
    Route::get('/CustomersRescul/{id}','CustomersRes');


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
    Route::get('/Leisuresearch','searchToures');
    Route::get('/CustomersReslei/{id}','CustomersRes');


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
    Route::get('/Medicalsearch','searchToures');
    Route::get('/CustomersResmed/{id}','CustomersRes');
});

//------------AuthController---------------------------
Route::controller(AuthController::class)->group(function(){
    Route::get('/signup','signup')->middleware('guest');
    Route::post('/register','register');
    Route::get('/login','loginpage')->middleware('guest');
    route::post('login',[AuthController::class,'login'])->name('login');

    Route::get('logout','logout');
    Route::get('Myprofile','Myprofile');
    Route::get('/Myreservations','Myreservations')->name('myMyreservations');
    Route::post('updatemyprofile/{id}','updatemyprofile');
});

// -----------Blog-----------------------------
Route::controller(BlogController::class)->group(function(){
    Route::get('/admin/createBlog','create');
    Route::get('/BlogDashboard','showBlog')->middleware('is_admin');
    Route::delete('/admin/deleteblog/{id}','destroy');
    Route::get('/admin/editBlog/{id}','edit');
    Route::get('/admin/restoreBlog/{id}','restore');
    Route::get('showcheckbox','showcheckbox');
    Route::post('checkbox','checkbox');
    Route::post('/storeBlog','storeBlog');
    Route::get('/BlogDashboard','BlogDashboard');
    Route::post('/editstatus/{id}','editstatus');

    Route::post('/Myprofile','showuserProfile');
    Route::post('/Bdash','dashboards');

    // Route::get('/editBlog','editBlog')->name('blogEdit');
    // Route::post('/updateBlog/{id}','updateBlog');

    Route::delete('deleteblog/{id}','destroy');
    Route::get('/BlogsHome','BlogsHome');
    Route::get('/showComments/{id}','showComments');

    Route::get('/Blogsearch','Blogsearch');
});

Route::controller(CommentController::class)->group(function(){
    Route::post('/addComment','createComment');
    Route::delete('deleteComment/{id}','destroy');
});

Route::controller(ReserveController::class)->group(function(){
    Route::get('/BookNow/{id}','BookNow');
    Route::post('/reserve','reserve');
    Route::get('/Ticket/{id}','Ticket');
    Route::delete('resarve/destroy/{id}','destroy');
    Route::delete('delete-multiple-category', 'deleteMultiple')->name('delete-multiple-category');
});

// Route::get('admin/profile', ['middleware' => 'is_admin', function()
// {
//     Route::get('/admin/dashboards','dashboards');

// }]);

Route::controller(LikeController::class)->group(function(){
    Route::post('/like','like');
});

Route::post('contact',[ContactController::class,'submit'])->name('contact.submit');

Route::controller(ReviewsController::class)->group(function(){
    Route::post('/review','review');
});

Route::controller(CityController::class)->group(function(){
    Route::get('admin/showCity','showCity')->name('show.city');
    Route::post('admin/storeCity','storeCity')->name('submit.city');
});

// reviews

