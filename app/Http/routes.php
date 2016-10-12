<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
{
    //TransactionMeeting
    $app->get('trans','TransMeetingController@index');
    $app->get('trans/{id}','TransMeetingController@get');
    $app->get('trans/meeting/{id}','TransMeetingController@getByMeeting');
    $app->post('trans','TransMeetingController@create');
    $app->post('attendance','TransMeetingController@update');
    $app->delete('trans/{id}','TransMeetingController@delete');

    //MeetingController
    $app->get('meeting','MeetingController@index');
    $app->get('meeting/{id}','MeetingController@get');
    $app->put('meeting/{id}','MeetingController@update');
    $app->delete('meeting/{id}','MeetingController@delete');
    $app->post('meeting','MeetingController@create');

    //StaffController
    $app->get('staff','StaffController@index');
    $app->get('staff/{id}','StaffController@get');
    $app->put('staff/{id}','StaffController@update');
    $app->delete('staff/{id}','StaffController@delete');
    $app->post('staff','StaffController@create');

    //DepartmentController
    $app->get('dept','DepartmentController@index');


});
