<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    // localization
    Route::get('lang/{lang}', 'LocalizeController@index')->name('admin.lang.set');

    CRUD::resource('requests', 'RequestCrudController');
    CRUD::resource('offers', 'OfferCrudController');
    CRUD::resource('invoices', 'InvoiceCrudController');

    // Analytics
    Route::get('analytics', 'AnalyticsController@index')->name('admin.analytics.index');
    Route::get('analytics/countries', 'AnalyticsController@index')->name('admin.analytics.countries');
    Route::get('analytics/browsers', 'AnalyticsController@index')->name('admin.analytics.browsers');
    Route::get('analytics/cities', 'AnalyticsController@index')->name('admin.analytics.cities');
    Route::get('analytics/os', 'AnalyticsController@index')->name('admin.analytics.os');
    Route::get('analytics/referrer', 'AnalyticsController@index')->name('admin.analytics.referrer');
    Route::get('analytics/urls', 'AnalyticsController@index')->name('admin.analytics.urls');
    Route::get('analytics/visitors', 'AnalyticsController@index')->name('admin.analytics.visitors');


    Route::get('/api/get_requests', 'Api\RequestsController@index')->name('admin_api.get.requests');
    Route::get('/api/get_request/{id}', 'Api\RequestsController@show')->name('admin_api.show.request');

    Route::get('/api/get_offers', 'Api\OffersController@index')->name('admin_api.get.offers');
    Route::get('/api/get_offer/{id}', 'Api\OffersController@show')->name('admin_api.show.offer');



}); // this should be the absolute last line of this file
