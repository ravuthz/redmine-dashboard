<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::get('/total_issue_list', 'HomeController@total_issue_list');
Route::get('/total_issue_chart', 'HomeController@total_issue_chart');
Route::get('/list_issues_status', 'HomeController@list_issues_status');

Route::get('json/projects', 'JsonController@projects');

Route::get('json/issues', 'JsonController@issues');

Route::get('json/list_issues', 'JsonController@list_issues');
Route::get('json/list_issues_array', 'JsonController@list_issues_array');

Route::get('json/count_issues', 'JsonController@count_issues');
Route::get('json/count_all_issues', 'JsonController@count_all_issues');
Route::get('json/get_issue_between', 'JsonController@get_issue_between');
Route::get('json/count_issues_array', 'JsonController@count_issues_array');





