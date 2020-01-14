<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 07.02.2019
 * Time: 9:34
 */

//Home
Breadcrumbs::register('admin.dashboard', function ($trail) {
    $trail->push('Админ', route( 'admin.dashboard','/'));
});

//Home -> Real Estate
Breadcrumbs::register('admin.roles.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Роли и пермишены', route('admin.roles.index'));
});

//Home -> Real Estate -> [Category]
Breadcrumbs::register('category', function ($trail, $category) {
    $trail->parent('real-estate');
    $trail->push($category->menu, route('estates', App\Http\Middleware\LocaleMiddleware::getLocale().$category->category_id));
});

Breadcrumbs::register('estate', function ($trail, $category) {
    $trail->parent('real-estate');
    $trail->push($category->title, route('estates', App\Http\Middleware\LocaleMiddleware::getLocale().$category->category_id));
});

//Home -> Real Estate -> [Category] -> [Estate]
//Breadcrumbs::register('estate', function ($trail, $estate) {
   // $trail->parent('category');
   // $trail->push($estate->title, route('estate', App\Http\Middleware\LocaleMiddleware::getLocale().$estate->estate_id));
//});
