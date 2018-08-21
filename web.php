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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) 
{
	$router->get('recipient',  ['uses' => 'RecipientController@showAllRecipients']);

	$router->get('recipient/{id}', ['uses' => 'RecipientController@showOneRecipient']);

	$router->post('recipient', ['uses' => 'RecipientController@create']);

	$router->delete('recipient/{id}', ['uses' => 'RecipientController@delete']);

	$router->put('recipient/{id}', ['uses' => 'RecipientController@update']);

	$router->get('offer',  ['uses' => 'SpecialOfferController@showAllOffers']);

	$router->get('offer/{id}', ['uses' => 'SpecialOfferController@showOneOffer']);

	$router->post('offer', ['uses' => 'SpecialOfferController@create']);

	$router->delete('offer/{id}', ['uses' => 'SpecialOfferController@delete']);

	$router->put('offer/{id}', ['uses' => 'SpecialOfferController@update']);

	$router->get('voucher',  ['uses' => 'VoucherController@showAllVouchers']);

	$router->get('voucher/{id}', ['uses' => 'VoucherController@showOneVoucher']);

	$router->post('voucher', ['uses' => 'VoucherController@create']);

	$router->delete('voucher/{id}', ['uses' => 'VoucherController@delete']);

	$router->put('voucher/{id}', ['uses' => 'VoucherController@update']);

	$router->post('usevoucher', ['uses' => 'VoucherController@consumeVoucher']);


});
