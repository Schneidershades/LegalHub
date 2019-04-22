<?php

Auth::routes();

Route::get('/', 'PageController@index');
Route::get('/page/{page}', 'PageController@page');
Route::post('/contact', ['uses' => 'PageController@storeContact', 'as' => 'store.contact']);


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => '/user', 'middleware' => ['auth:web']],  function(){

	Route::post('/pay', 'Users\RaveController@initialize')->name('pay');
	Route::post('/rave/callback', 'Users\RaveController@callback')->name('callback');

	Route::get('/activities', 'HomeController@activities')->name('activity');
	
	Route::resource('/business', 'Users\BusinessRegistrationController');
	Route::get('/business/delete/{id}', 'Users\BusinessRegistrationController@destroy')->name('business.delete');
	Route::post('/business/update/{id}', 'Users\BusinessRegistrationController@update')->name('business.update');

	Route::resource('trademark', 'Users\TrademarkController');
	Route::get('trademark/delete/{id}', 'Users\TrademarkController@destroy')->name('trademark.delete');
	Route::post('trademark/update/{id}', 'Users\TrademarkController@update')->name('trademark.update');
	
	Route::resource('copyright', 'Users\CopyrightController');
	Route::get('copyright/delete/{id}', 'Users\CopyrightController@destroy')->name('copyright.delete');
	Route::post('copyright/update/{id}', 'Users\CopyrightController@update')->name('copyright.update');
	
	Route::resource('patent', 'Users\PatentController');
	Route::get('patent/delete/{id}', 'Users\PatentController@destroy')->name('patent.delete');
	Route::post('patent/update/{id}', 'Users\PatentController@update')->name('patent.update');
	
	Route::resource('company', 'Users\CompanyRegistrationController');
	Route::get('company/delete/{id}', 'Users\CompanyRegistrationController@destroy')->name('company.delete');
	Route::post('company/update/{id}', 'Users\CompanyRegistrationController@update')->name('company.update');
	
	Route::resource('ngo', 'Users\NgoRegistrationController');
	Route::get('ngo/delete/{id}', 'Users\NgoRegistrationController@destroy')->name('ngo.delete');
	Route::post('ngo/update/{id}', 'Users\NgoRegistrationController@update')->name('ngo.update');


	Route::resource('profile', 'Users\ProfileController');
	Route::get('profile/delete/{id}', 'Users\ProfileController@destroy')->name('ngo.delete');
	Route::post('profile/update/{id}', 'Users\ProfileController@update')->name('ngo.update');

	// Route::post('/signature', 'Users\BusinessRegistrationController@postSignature')->name('user.upload.signature');
	// Route::post('/passport', 'Users\BusinessRegistrationController@postPassport')->name('user.upload.passport');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth:web']],  function(){
	Route::resource('/service', 'Admin\RegistrationItemController');
	Route::get('/service/update/{service}', 'Admin\RegistrationItemController@update')->name('service.update');
	// Route::get('/service/delete/{id}', 'Admin\ServiceController@destroy')->name('service.delete');
	Route::post('/service/item/create', 'Admin\RegistrationItemController@storeItem')->name('item.store');   

	Route::resource('/user/discount', 'Admin\DiscountServiceController');
	Route::get('/user/discount/update/{service}', 'Admin\DiscountServiceController@update')->name('discount.update');
	Route::get('/service/delete/{id}', 'Admin\DiscountServiceController@destroy')->name('discount.delete');

	Route::get('/settings',['uses' => 'Admin\SettingController@index', 'as' => 'setting']);

	Route::post('/setting/update',['uses' => 'Admin\SettingController@update', 'as' => 'setting.update']);

	Route::resource('/faq', 'Admin\FaqsController');
	Route::get('/faq/delete/{id}', 'Admin\FaqsController@destroy')->name('faq.delete');
	Route::post('/faq/update/{id}', 'Admin\FaqsController@update')->name('faq.update');

	Route::resource('/count', 'Admin\CountController');
	Route::get('/count/delete/{id}', 'Admin\CountController@destroy')->name('count.delete');
	Route::post('/count/update/{id}', 'Admin\CountController@update')->name('count.update');

	Route::resource('/slider', 'Admin\SliderController');
	Route::get('/slider/delete/{id}', 'Admin\SliderController@destroy')->name('slider.delete');
	Route::post('/slider/update/{id}', 'Admin\SliderController@update')->name('slider.update');

	Route::resource('/partner', 'Admin\PartnerController');
	Route::get('/partner/delete/{id}', 'Admin\PartnerController@destroy')->name('partner.delete');
	Route::post('/partner/update/{id}', 'Admin\PartnerController@update')->name('partner.update');

	Route::resource('/user', 'Admin\UsersController');
	Route::get('/user/delete/{id}', 'Admin\UsersController@destroy')->name('user.delete');
	Route::post('/user/update/{id}', 'Admin\UsersController@update')->name('user.update');

	Route::resource('/roleDiscount', 'Admin\RoleDiscountController');
	Route::get('/roleDiscount/delete/{id}', 'Admin\RoleDiscountController@destroy')->name('roleDiscount.delete');
	Route::post('/roleDiscount/update/{id}', 'Admin\RoleDiscountController@update')->name('roleDiscount.update');

	Route::resource('/role', 'Admin\RoleController');
	Route::get('/role/delete/{id}', 'Admin\RoleController@destroy')->name('role.delete');
	Route::post('/role/update/{id}', 'Admin\RoleController@update')->name('role.update');

	Route::resource('/order', 'Admin\OrderController');
	Route::get('/order/delete/{id}', 'Admin\OrderController@destroy')->name('order.delete');
	Route::post('/order/update/{id}', 'Admin\OrderController@update')->name('order.update');

	Route::resource('/payment', 'Admin\PaymentController');
	Route::post('/payment/update/{id}', 'Admin\PaymentController@update')->name('payment.update');
});