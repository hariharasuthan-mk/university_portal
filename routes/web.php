<?php

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

Auth::routes(); //Authetication Package

Route::get('/', function () { //Front page
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home'); // Home page


Route::group(['middleware' => ['auth']], function() {


    Route::resource('roles','RoleController'); //spatie package
    Route::resource('users','UserController');  //auth package  
    Route::resource('universities','UniversityController');
    Route::resource('states', 'StateController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('studentbatchs', 'StudentbatchController');
    Route::resource('studentbatchhistory', 'StudentbatchhistoryController');
    Route::resource('student', 'StudentController');
    Route::resource('course', 'CourseController');
    Route::resource('result', 'ResultController');

    Route::resource('test', 'TestController');
    

    Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "Cache is cleared";
	});
    
    /*json ajax data start*/

    Route::get('department/get/{id}','StudentbatchController@getDepartments');
    Route::get('sno/get/{id}', 'UserController@getSNO');
    Route::get('getcourse/{id1}/{id2}','CourseController@getCourseDepoUniv');
    Route::get('getstudent/{id1}/{id2}','StudentController@getStudentCourse');

     /*json ajax data end*/


    // Create file upload form
    Route::get('/upload-file', 'FilesController@createForm');
    // Store file
    Route::post('/upload-file', 'FilesController@fileUpload')->name('fileUpload');
    // Destroy file
    Route::DELETE('/upload-file/{id}','FilesController@destroy')->name('destroy');
    //Download file
    Route::get('/downloads/{id}', 'FilesController@pdfDownload')->name('pdfDownload');


});