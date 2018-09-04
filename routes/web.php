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

Route::get('/','FrontendController@getHome' );
Route::get('category/{cate_id}/{slug}.html','FrontendController@getCategory');
Route::get('detail/{prod_id}/{slug}.html','FrontendController@getDetail' );
Route::post('detail/{prod_id}/{slug}.html','FrontendController@postComment' );
Route::get('search','FrontendController@getSearch');

Route::group(['prefix'=>'cart'], function(){
   Route::get('add/{prod_id}','CartController@getAddCart');
   Route::get('show','CartController@getShowCart');  
   Route::get('delete/{prod_id}','CartController@getDeleteCart'); 
   Route::get('update','CartController@getUpdateCart'); 
   Route::post('show','CartController@postComplete'); 

});
Route::get('complete','CartController@getComplete');


Route::group(['namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'login','middleware'=>'CheckLogin'],function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');
    });
    Route::get('logout','HomeController@getLogout');

    Route::group(['prefix'=>'admin','middleware'=>'CheckLogOut'],function(){
        Route::get('home','HomeController@getHome');
        
        //phan danh muc
        Route::group(['prefix'=>'Category'],function(){
            Route::get('/','CategoryController@getCate');
            Route::post('/','CategoryController@postCate');

            Route::get('edit/{cate_id}','CategoryController@getEditCate');
            Route::post('edit/{cate_id}','CategoryController@postEditCate');

            Route::get('delete/{cate_id}','CategoryController@getDeleteCate');
            
        });
        //phan san pham
        Route::group(['prefix'=>'Product'],function(){
            Route::get('/','ProductController@getProduct');

            Route::get('add','ProductController@getAddProduct');
            Route::post('add','ProductController@postAddProduct');

            Route::get('edit/{prod_id}','ProductController@getEditProduct');
            Route::post('edit/{prod_id}','ProductController@postEditProduct');

            Route::get('delete/{prod_id}','ProductController@getDeleteProduct');
            
            
        });

    });
   

});
