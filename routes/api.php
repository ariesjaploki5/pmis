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
    Route::get('all_items', 'ItemCtr@all');
    Route::post('item', 'ItemCtr@store');
    Route::put('item/{id}', 'ItemCtr@update');
    Route::delete('item/{id}/delete', 'ItemCtr@destroy');


    Route::get('access_levels', 'AccessLevelCtr@index');
    Route::get('all_access_levels', 'AccessLevelCtr@all');
    Route::post('access_level', 'AccessLevelCtr@store');
    Route::put('access_level/{id}', 'AccessLevelCtr@update');
    Route::delete('access_level/{id}/delete', 'AccessLevelCtr@destroy');

    Route::get('departments', 'DepartmentCtr@index');
    Route::post('department', 'DepartmentCtr@store');
    Route::put('department/{id}', 'DepartmentCtr@update');
    Route::delete('department/{id}/delete', 'DepartmentCtr@destroy');

    Route::get('divisions', 'DivisionCtr@index');
    Route::get('all_divisions', 'DivisionCtr@all');
    Route::post('division', 'DivisionCtr@store');
    Route::put('division/{id}', 'DivisionCtr@update');
    Route::delete('division/{id}/delete', 'DivisionCtr@destroy');

    Route::get('employees', 'EmployeeCtr@index');
    Route::post('employee', 'EmployeeCtr@store');
    Route::put('employee/{id}', 'EmployeeCtr@update');
    Route::delete('employee/{id}/delete', 'EmployeeCtr@destroy');

    Route::get('heads', 'HeadCtr@index');
    Route::get('all_heads', 'HeadCtr@all');
    Route::post('head', 'HeadCtr@store');
    Route::put('head/{id}', 'HeadCtr@update');
    Route::delete('head/{id}/delete', 'HeadCtr@destroy');

    Route::get('pap_codes', 'PapCodeCtr@index');
    Route::get('all_pap_codes', 'PapCodeCtr@all');
    Route::post('pap_code', 'PapCodeCtr@store');
    Route::put('pap_code/{id}', 'PapCodeCtr@update');
    Route::delete('pap_code/{id}/delete', 'PapCodeCtr@destroy');

    Route::get('purchase_requests', 'PurchaseRequestCtr@index');
    Route::post('purchase_request', 'PurchaseRequestCtr@store');
    Route::put('purchase_request/{id}', 'PurchaseRequestCtr@update');
    Route::delete('purchase_request/{id}/delete', 'PurchaseRequestCtr@destroy');

    Route::get('request_items', 'RequestItemCtr@index');
    Route::post('request_item', 'RequestItemCtr@store');
    Route::put('request_item/{id}', 'RequestItemCtr@update');
    Route::delete('request_item/{id}/delete', 'RequestItemCtr@destroy');



    Route::get('categories', 'CategoryCtr@index');
    Route::post('category', 'CategoryCtr@store');
    Route::put('category/{id}', 'CategoryCtr@update');
    Route::delete('category/{id}/delete', 'CategoryCtr@destroy');

    Route::get('/users', 'UserCtr@index');
    Route::post('/user', 'UserCtr@store');
    Route::put('/user/{id}', 'UserCtr@update');
    Route::delete('/user/{id}/delete', 'UserCtr@destroy');

    Route::get('/units', 'UnitCtr@index');
    Route::post('/unit', 'UnitCtr@store');
    Route::put('/unit/{id}', 'UnitCtr@update');
    Route::get('/all_units', 'UnitCtr@all');

    Route::get('/pmos', 'PmoCtr@index');
    Route::post('/pmo', 'PmoCtr@store');
    Route::put('/pmo/{id}', 'PmoCtr@update');
    Route::delete('/pmo/{id}/delete', 'PmoCtr@destroy');
    Route::get('/all_pmos', 'PmoCtr@all');

    Route::get('/purchase_orders', 'PurchaseOrderCtr@index');
    Route::post('/purchase_order', 'PurchaseOrderCtr@store');
    Route::put('/purchase_order', 'PurchaseOrderCtr@update');
    
    Route::get('/mops', 'ModeOfProcurementCtr@index');
    Route::get('/all_mops', 'ModeOfProcurementCtr@all');
    Route::post('/mop', 'ModeOfProcurementCtr@store');
    Route::put('/mop/{id}', 'ModeOfProcurementCtr@update');
    Route::delete('/mop/{id}/delete', 'ModeOfProcurementCtr@destroy');

    Route::get('/purchase_requests', 'PurchaseRequestCtr@index');
    Route::post('/purchase_request', 'PurchaseRequestCtr@store');

    Route::post('/purchase_request_items/{id}', 'PurchaseRequestCtr@store_items');

    Route::put('/purchase_request/{id}', 'PurchaseRequestCtr@update');
    Route::delete('/purchase_request/{id}/delete', 'PurchaseRequestCtr@destroy');

    Route::post('ppmp', 'PpmpCtr@store');
    Route::get('ppmp', 'PpmpCtr@index');


    Route::get('/ict_supply', 'PPMP\IctSupplyCtr@index');
    Route::post('/ict_supply/{id}', 'PPMP\IctSupplyCtr@store');
    Route::put('/ict_supply/{id}', 'PPMP\IctSupplyCtr@update');
    Route::delete('/ict_supply/{id}', 'PPMP\IctSupplyCtr@destroy');


    Route::get('/drugs_and_medicines', 'DrugsAndMedicinesCtr@index');
    Route::post('/drugs_and_medicines/search', 'DrugsAndMedicinesCtr@search');
    Route::post('/drugs_and_medicines/{dmdcomb}/{dmdctr}', 'DrugsAndMedicinesCtr@add');
    Route::delete('/drugs_and_medicines/{dmdcomb}/{dmdctr}', 'DrugsAndMedicinesCtr@remove');


    Route::get('/drugs_and_medicines_cart', 'DrugsAndMedicinesCtr@cart');