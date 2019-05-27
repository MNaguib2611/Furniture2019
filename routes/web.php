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

Route::group(['middleware' => ['loggedInMiddleware']], function () {
    Route::get('/dashboard','HomeController@dashboard' );
    Route::get('/transactions','HomeController@transactions' );
    Route::resource('customers', 'CustomerController');
    Route::get('customer/delete/{id}','CustomerController@removeCustomer');



    Route::resource('debited-transactions', 'DebitedTransactionController');
    Route::get('debited-transaction/delete/{id}','DebitedTransactionController@removeDebitedTransaction');
    Route::resource('credited-transactions', 'CreditedTransactionController');
    Route::get('credited-transaction/delete/{id}','CreditedTransactionController@removeCreditedTransaction');



    Route::post('customerNewOrder','CustomerController@customerNewOrder');
    Route::resource('products', 'ProductController');
    Route::get('products/delete/{id}','ProductController@removeProduct');
    Route::resource('orders', 'OrderController');
    Route::post('orderProducts', 'OrderController@orderProducts');
    Route::get('orderProducts/delete/{id}', 'OrderProductController@removeOrderProduct');

    Route::resource('transaction-types', 'TransactionTypesController');

});

Route::get('/','HomeController@showLoginForm' );
Route::post('/login','HomeController@login' );
Route::get('/logout','HomeController@logout' );



