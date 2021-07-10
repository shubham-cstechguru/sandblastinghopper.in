<?php


use Illuminate\Support\Facades\Route;

// Login
Route::get('admin-control/mobile', 'admin\MobileController@index');
Route::get('admin-control/reset-password', 'admin\ResetpasswordController@index');

Route::group(['prefix' => 'admin-control', 'middleware' => 'guest'], function () {
    Route::get('/', ['as' => 'login', 'uses' => 'admin\UserController@login']);
    Route::post('login-auth', 'admin\UserController@auth');
});

// Logout

Route::group(['prefix' => 'admin-control', 'middleware' => 'auth'], function () {
    Route::get('logout', 'admin\UserController@logout');
    Route::get('dashboard', ['as' => 'home', 'uses' => 'admin\DashboardController@index']);

    // dashboard

    Route::get('dashboard', 'admin\DashboardController@index');
    Route::get('/inquiry', 'admin\InquiryController@index');

    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('cache:clear');
        return 'clearede';
    });
    // productnology

    Route::get('service', 'admin\ServiceController@index');
    Route::get('service/add', 'admin\ServiceController@add');
    Route::post('service/add', 'admin\ServiceController@adddata');
    Route::get('service/edit/{id}', 'admin\ServiceController@edit');
    Route::post('service/edit/{id}', 'admin\ServiceController@editdata');
    Route::get('service/remove/{id}', 'admin\ServiceController@remove');
    Route::post('service/removeMultiple', 'admin\ServiceController@removeMultiple');

    // Service

    Route::get('product', 'admin\TechnologyController@index');
    Route::get('product/add', 'admin\TechnologyController@add');
    Route::post('product/add', 'admin\TechnologyController@adddata');
    Route::get('product/edit/{id}', 'admin\TechnologyController@edit');
    Route::post('product/edit/{id}', 'admin\TechnologyController@editdata');
    Route::get('product/remove/{id}', 'admin\TechnologyController@remove');
    Route::post('product/removeMultiple', 'admin\TechnologyController@removeMultiple');

    // About

    Route::get('about', 'admin\AboutController@index');
    Route::get('about/add', 'admin\AboutController@add');
    Route::post('about/add', 'admin\AboutController@adddata');
    Route::get('about/edit/{id}', 'admin\AboutController@edit');
    Route::post('about/edit/{id}', 'admin\AboutController@editdata');
    Route::get('about/remove/{id}', 'admin\AboutController@remove');
    Route::post('about/removeMultiple', 'admin\AboutController@removeMultiple');


    // Service

    Route::get('blog', 'admin\BlogController@index');
    Route::get('blog/add', 'admin\BlogController@add');
    Route::post('blog/add', 'admin\BlogController@adddata');
    Route::get('blog/edit/{id}', 'admin\BlogController@edit');
    Route::post('blog/edit/{id}', 'admin\BlogController@editdata');
    Route::get('blog/remove/{id}', 'admin\BlogController@remove');
    Route::post('blog/removeMultiple', 'admin\BlogController@removeMultiple');

    // Setting

    Route::get('setting', 'admin\SettingController@index');
    Route::get('setting/edit/{id}', 'admin\SettingController@edit');
    Route::post('setting/edit/{id}', 'admin\SettingController@editdata');


    // category

    Route::get('category', 'admin\CategoryController@index');
    Route::get('category/add', 'admin\CategoryController@add');
    Route::post('category/add', 'admin\CategoryController@adddata');
    Route::get('category/edit/{id}', 'admin\CategoryController@edit');
    Route::post('category/edit/{id}', 'admin\CategoryController@editdata');
    Route::get('category/remove/{id}', 'admin\CategoryController@remove');
    Route::post('category/removeMultiple', 'admin\CategoryController@removeMultiple');


    // Faqs

    Route::get('faqs', 'admin\FaqsController@index');
    Route::get('faqs/add', 'admin\FaqsController@add');
    Route::post('faqs/add', 'admin\FaqsController@adddata');
    Route::get('faqs/edit/{id}', 'admin\FaqsController@edit');
    Route::post('faqs/edit/{id}', 'admin\FaqsController@editdata');
    Route::get('faqs/remove/{id}', 'admin\FaqsController@remove');
    Route::post('faqs/removeMultiple', 'admin\FaqsController@removeMultiple');

    // city, country

    Route::resources([
        'city' => 'admin\CityController',
        'country' => 'admin\CountryController',
    ]);
    Route::post('product/product-city/{id}', 'admin\LocationController@city')->name('locatecity');
    Route::any('product/product-country/{id}', 'admin\LocationController@country');


    // change password

    Route::get('/change-password', 'admin\ChangepasswordController@index');
    Route::post('/change-password', 'admin\ChangepasswordController@changePassword');

    // Inquiry
    Route::get('/inquiry/pending', 'admin\InquiryController@index');
    Route::get('/inquiry/confirmed', 'admin\InquiryController@confirmed');
    Route::get('/inquiry/in-progress', 'admin\InquiryController@inprogress');
});
