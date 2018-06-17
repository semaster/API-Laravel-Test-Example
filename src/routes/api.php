<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('user', function (Request $request) {return $request->user();});
    // get details on task by id
    Route::get('task/{task}', 'TaskController@show');
    // get list of comments by task_id
    Route::get('task/{task}/comments', 'TaskController@comments');
    // add new comment
    Route::post('comment', 'CommentController@store');
    // edit comment by id
    Route::put('comment/{comment}', 'CommentController@update');
    // search through comment's field comment
    Route::get('search/comment/{query}', 'SearchController@findComment');
    //search through task's field description
    Route::get('search/task/{query}', 'SearchController@findTask');
});