<?php
Route::get('test','Home\TestController@index')->name('home.test.index');
Route::match(['get', 'post'],'test/update','Home\TestController@update')->name('home.test.update');
Route::post('test/delete','Home\TestController@delete')->name('home.test.delete');