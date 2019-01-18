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

//----------------------------------------= Grade Route
Route::get('grade','Admin\GradeController@index')->name('admin.grade.index');
    Route::post('grade/store','Admin\GradeController@store')->name('admin.grade.store');
Route::get('grade/edit/{grade}','Admin\GradeController@edit')->name('admin.grade.edit');
Route::post('grade/update/{grade}','Admin\GradeController@update')->name('admin.grade.update');
Route::post('grade/remove/{grade}','Admin\GradeController@remove')->name('admin.grade.remove');

//----------------------------------------= Book Route
Route::get('book','Admin\BookController@index')->name('admin.book.index');
Route::post('book/store','Admin\BookController@store')->name('admin.book.store');
Route::get('book/edit/{book}','Admin\BookController@edit')->name('admin.book.edit');
Route::post('book/update/{book}','Admin\BookController@update')->name('admin.book.update');
Route::post('book/remove/{book}','Admin\BookController@remove')->name('admin.book.remove');

//----------------------------------------= Session Route
Route::get('session','Admin\SessionController@index')->name('admin.session.index');
Route::post('session/store','Admin\SessionController@store')->name('admin.session.store');
Route::get('session/edit/{session}','Admin\SessionController@edit')->name('admin.session.edit');
Route::post('session/update/{session}','Admin\SessionController@update')->name('admin.session.update');
Route::post('session/remove/{session}','Admin\SessionController@remove')->name('admin.session.remove');

//----------------------------------------= Question Route
Route::get('question','Admin\QuestionController@index')->name('admin.question.index');
Route::post('question/store','Admin\QuestionController@store')->name('admin.question.store');
Route::get('question/edit/{question}','Admin\QuestionController@edit')->name('admin.question.edit');
Route::post('question/update/{question}','Admin\QuestionController@update')->name('admin.question.update');
Route::post('question/remove/{question}','Admin\QuestionController@remove')->name('admin.question.remove');

//----------------------------------------= Exam Route
Route::get('exam','Admin\ExamController@index')->name('admin.exam.index');
Route::post('exam/take','Admin\ExamController@take')->name('admin.exam.take');

//----------------------------------------= Export Route
Route::get('export','Admin\ExportController@index')->name('admin.export.index');
Route::post('export/excel','Admin\ExportController@excel')->name('admin.export.excel');
Route::post('export/word','Admin\ExportController@word')->name('admin.export.word');
Route::get('export/excel/all','Admin\ExportController@excel')->name('admin.export.all.excel');
Route::get('export/word/all','Admin\ExportController@word')->name('admin.export.all.word');

//----------------------------------------= Import Route
Route::get('import','Admin\ImportController@index')->name('admin.import.index');
Route::post('import','Admin\ImportController@import')->name('admin.import.submit');

Route::get('/','Admin\IndexController@index')->name('admin.index');
Route::get('/test',function (){
    $arr2 = $arr = ['a'=>'a','b'=>'b','c'=>'c','d'=>'d','e'=>'e','f'=>'f','g'=>'g'];

    $index = 'a';
    $keys = array_keys($arr);

    shuffle($arr);
//
    $i = 0;
    foreach($arr2 as $key => $a) {
        $new[$key] = $arr[$i++];
    }

    $arr = $new;
    dd($arr,$arr2);
})->name('admin.test');