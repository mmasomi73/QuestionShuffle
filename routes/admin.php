<?php

//----------------------------------------= Grade Route
Route::get('grade','GradeController@index')->name('admin.grade.index');
Route::post('grade/store','GradeController@store')->name('admin.grade.store');
Route::get('grade/edit/{grade}','GradeController@edit')->name('admin.grade.edit');
Route::post('grade/update/{grade}','GradeController@update')->name('admin.grade.update');
Route::post('grade/remove/{grade}','GradeController@remove')->name('admin.grade.remove');

//----------------------------------------= Book Route
Route::get('book','BookController@index')->name('admin.book.index');
Route::post('book/store','BookController@store')->name('admin.book.store');
Route::get('book/edit/{book}','BookController@edit')->name('admin.book.edit');
Route::post('book/update/{book}','BookController@update')->name('admin.book.update');
Route::post('book/remove/{book}','BookController@remove')->name('admin.book.remove');

//----------------------------------------= Session Route
Route::get('session','SessionController@index')->name('admin.session.index');
Route::post('session/store','SessionController@store')->name('admin.session.store');
Route::get('session/edit/{session}','SessionController@edit')->name('admin.session.edit');
Route::post('session/update/{session}','SessionController@update')->name('admin.session.update');
Route::post('session/remove/{session}','SessionController@remove')->name('admin.session.remove');

//----------------------------------------= Question Route
Route::get('question','QuestionController@index')->name('admin.question.index');
Route::post('question/store','QuestionController@store')->name('admin.question.store');
Route::get('question/edit/{question}','QuestionController@edit')->name('admin.question.edit');
Route::post('question/update/{question}','QuestionController@update')->name('admin.question.update');
Route::post('question/remove/{question}','QuestionController@remove')->name('admin.question.remove');

//----------------------------------------= Exam Route
Route::get('exam','ExamController@index')->name('admin.exam.index');
Route::post('exam/take','ExamController@take')->name('admin.exam.take');

//----------------------------------------= Export Route
Route::get('export','ExportController@index')->name('admin.export.index');
Route::post('export/excel','ExportController@excel')->name('admin.export.excel');
Route::post('export/word','ExportController@word')->name('admin.export.word');
Route::get('export/excel/all','ExportController@excel')->name('admin.export.all.excel');
Route::get('export/word/all','ExportController@word')->name('admin.export.all.word');

//----------------------------------------= Import Route
Route::get('import','ImportController@index')->name('admin.import.index');
Route::post('import','ImportController@import')->name('admin.import.submit');

Route::get('/','IndexController@index')->name('admin.index');
Route::get('/profile','IndexController@profile')->name('admin.profile');
Route::post('/profile/update','IndexController@update')->name('admin.profile.update');
Route::post('/profile/password','IndexController@password')->name('admin.profile.password');

