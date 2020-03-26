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

Route::get('/', function () {
	dd(\App\User::all());

    return view('welcome');
});


Route::get('/home', ['middleware' => ['auth'], 'uses'=> 'HomeController@index'])->name('home');
//Route::get('/home', ['middleware' => ['auth', 'admin'], 'uses'=> 'HomeController@admin'])->name('home');
//Route::get('/home', ['middleware' => ['auth', 'student'], 'uses'=> 'HomeController@index'])->name('home');



Auth::routes();


Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


Route::group(['middleware' => ['auth', 'student']], function () {
	Route::get('subjects', 'StudentNavController@subjects'); 
	Route::get('notifications', 'StudentNavController@notifications')->name('student_notifications'); 
	Route::get('diary', 'StudentNavController@diary')->name('student_diary'); 

	Route::post('diary/query', 'StudentNavController@diary_month')->name('student_diary_month'); 
});


Route::group(['middleware' => ['auth', 'teacher']], function () {
	Route::get('journals', 'TeacherNavController@journals'); 
	Route::get('journals/{id}', 'TeacherNavController@journal')->name('journal'); 
	
	Route::get('journal/get_marks', 'TeacherNavController@get_marks'); 
	Route::post('journal/set_mark', 'TeacherNavController@set_mark'); 
	Route::post('journal/add_comment', 'TeacherNavController@addComment'); 
	Route::post('journal/set_homework', 'TeacherNavController@setHomework'); 
});


Route::group(['middleware' => ['auth', 'admin']], function () {
	
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('grades', 'GradeController'); 
	Route::resource('cabinets', 'CabinetController'); 
	Route::resource('lessons', 'LessonController'); 
	Route::resource('students', 'StudentController'); 
	Route::resource('teachers', 'TeacherController'); 
	Route::resource('subjects', 'SubjectController'); 
	Route::resource('timetables', 'TimetableController'); 
	Route::resource('mark_types', 'MarkTypeController'); 
	Route::resource('days', 'DayController'); 
	
});

