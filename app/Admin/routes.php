<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'domain'     => config('admin.route.domain'),
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', 'UserController');
    $router->resource('customer', 'CustomerController');
    $router->resource('customerpeople', 'CustomerPeopleController');
    $router->resource('buyer', 'BuyerController');
    $router->resource('buyerpeople', 'BuyerPeopleController');
    $router->resource('tag', 'TagController');
    $router->resource('taggable', 'TaggableController');
    $router->resource('contact', 'ContactController');
    $router->resource('jobtag', 'JobTagController');
    $router->resource('category', 'CategoryController');
    $router->resource('showme', 'ShowMeController');
    $router->resource('phpinfo', 'ShowPhpInfoController');
    $router->resource('buyerdb', 'DataBaseBankController');


});
