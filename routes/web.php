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
    return view('welcome');
});
Route::get('/index', function(){
    return view('menu.index');
});
Route::get('/course', function(){
    return view('menu.course');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quiz', 'HomeController@quiz');
Route::get('/room', 'HomeController@room');
Route::get('/report', 'HomeController@report');
Route::get('/result', 'HomeController@result');
Route::post('/questions/update', 'QuestionController@update_question');
Route::post('/rooms/search', 'RoomController@search');
Route::get('/quizzes/take', 'QuizController@take');
Route::post('/test', 'QuizController@submit');
Route::resources([
    "quizzes" => "QuizController",
    "questions" => "QuestionController",
    "answers" => "AnswerController",
    "rooms" => "RoomController",
    "students" => "StudentController",
    "responses" => "ResponseController"
]);
