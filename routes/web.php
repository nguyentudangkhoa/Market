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

use Illuminate\Support\Facades\Route;

Route::get('/', ['as'=>'trangchu',
                 'uses'=>'HomeController@Index']);
Route::get('index',['as'=>'trangchu',
                    'uses'=>'HomeController@Index']);
Route::get('single/{id?}',['as'=>'single',
                     'uses'=>'HomeController@Single']);//phải thêm ? đằng sau param truyền vào
Route::get('product',['as'=>'product',
                      'uses'=>'HomeController@Product']);
Route::get('product2',['as'=>'product2',
                      'uses'=>'HomeController@Product2']);
Route::get('payment',['as'=>'payment',
                      'uses'=>'HomeController@Payment']);
Route::get('faqs',['as'=>'faqs',
                      'uses'=>'HomeController@Faqs']);
Route::get('about',['as'=>'about',
                      'uses'=>'HomeController@About']);
Route::get('privacy',['as'=>'privacy',
                      'uses'=>'HomeController@Privacy']);
Route::get('help',['as'=>'help',
                      'uses'=>'HomeController@Help']);
Route::get('single2',['as'=>'single2',
                      'uses'=>'HomeController@Single2']);
Route::get('contact',['as'=>'contact',
                      'uses'=>'HomeController@Contact']);
Route::get('add-to-cart/{id?}',['as'=>'add-to-cart',
                      'uses'=>'HomeController@AddToCart']);
Route::get('delete/{id?}',['as'=>'delete',
                      'uses'=>'HomeController@DeleteCart']);
Route::get('signup',['as'=>'signup',
                      'uses'=>'HomeController@SignUp']);
Route::get('signin',['as'=>'signin',
                      'uses'=>'HomeController@SignIn']);
Route::get('checkout.html',['as'=>'checkout.html',
                      'uses'=>'HomeController@Checkout']);
Route::post('checkout',['as'=>'checkout',
                      'uses'=>'HomeController@postCheckout']);
Route::post('signup',['as'=>'signup',
                      'uses'=>'HomeController@postSignUp']);
Route::post('signin',['as'=>'signin',
                      'uses'=>'HomeController@postSignIn']);
Route::get('signout',['as'=>'signout',
                      'uses'=>'HomeController@postSignOut']);
Route::get('search',['as'=>'search',
                      'uses'=>'HomeController@FindProduct']);
Route::get('admin',['as'=>'admin',
                      'uses'=>'HomeController@Admin']);
Route::post('deleteitem/{id?}',['as'=>'deleteitem',
                      'uses'=>'HomeController@DeleteItem']);
Route::get('addproduct',['as'=>'addproduct',
                      'uses'=>'HomeController@AddProduct']);
Route::post('postFile',['as'=>'postFile',
                        'uses'=>'HomeController@postFile']);
Route::get('update/{id?}',['as'=>'update',
                        'uses'=>'HomeController@UpdateProduct']);
Route::post('updateProduct',['as'=>'updateProduct',
                        'uses'=>'HomeController@UpdateButton']);
