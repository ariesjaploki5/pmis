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

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

    Route::get('items', 'ItemCtr@index');
    Route::post('item', 'ItemCtr@store');
    Route::put('item/{id}', 'ItemCtr@update');
    Route::delete('item/{id}', 'ItemCtr@destroy');

    Route::get('departments', 'DepartmentCtr@index');
    Route::post('department', 'DepartmentCtr@store');
    Route::put('department/{id}', 'DepartmentCtr@update');
    Route::delete('department/{id}', 'DepartmentCtr@destroy');

    Route::get('divisions', 'DivisionCtr@index');
    Route::get('all_divisions', 'DivisionCtr@all');
    Route::post('division', 'DivisionCtr@store');
    Route::put('division/{id}', 'DivisionCtr@update');
    Route::delete('division/{id}', 'DivisionCtr@destroy');

    Route::get('employees', 'EmployeeCtr@index');
    Route::post('employee', 'EmployeeCtr@store');
    Route::put('employee/{id}', 'EmployeeCtr@update');
    Route::delete('employee/{id}', 'EmployeeCtr@destroy');

    Route::get('heads', 'HeadCtr@index');
    Route::get('all_heads', 'HeadCtr@all');
    Route::post('head', 'HeadCtr@store');
    Route::put('head/{id}', 'HeadCtr@update');
    Route::delete('head/{id}', 'HeadCtr@destroy');

    Route::get('pap_codes', 'PapCodeCtr@index');
    Route::get('all_pap_codes', 'PapCodeCtr@all');
    Route::post('pap_code', 'PapCodeCtr@store');
    Route::put('pap_code/{id}', 'PapCodeCtr@update');
    Route::delete('pap_code/{id}', 'PapCodeCtr@destroy');

    Route::get('purchase_requests', 'PurchaseRequestCtr@index');
    Route::post('purchase_request', 'PurchaseRequestCtr@store');
    Route::put('purchase_request/{id}', 'PurchaseRequestCtr@update');
    Route::delete('purchase_request/{id}', 'PurchaseRequestCtr@destroy');

    Route::get('request_items', 'RequestItemCtr@index');
    Route::post('request_item', 'RequestItemCtr@store');
    Route::put('request_item/{id}', 'RequestItemCtr@update');
    Route::delete('request_item/{id}', 'RequestItemCtr@destroy');

    Route::get('unit_of_issues', 'UnitOfIssueCtr@index');
    Route::post('unit_of_issue', 'UnitOfIssueCtr@store');
    Route::put('unit_of_issue/{id}', 'UnitOfIssueCtr@update');
    Route::delete('unit_of_issue/{id}', 'UnitOfIssueCtr@destroy');

    Route::get('categories', 'CategoryCtr@index');
    Route::post('category', 'CategoryCtr@store');
    Route::put('category/{id}', 'CategoryCtr@update');
    Route::delete('category/{id}', 'CategoryCtr@destroy');



    Route::get('/users', 'UserCtr@index');


    Route::get('/units', 'UnitCtr@index');
    Route::get('/all_units', 'UnitCtr@all');