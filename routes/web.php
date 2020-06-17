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

//Template Index
Route::get('/', [
    'as' => 'trangchu',
    'uses' => 'HomeController@Index'
]);
Route::get('index', [
    'as' => 'index',
    'uses' => 'HomeController@Index'
]);
//product detail

Route::get('single/{id?}', [
    'as' => 'single',
    'uses' => 'HomeController@Single'
]); //phải thêm ? đằng sau param truyền vào
//Product
Route::get('product', [
    'as' => 'product',
    'uses' => 'HomeController@Product'
]);
Route::get('product2', [
    'as' => 'product2',
    'uses' => 'HomeController@Product2'
]);
//Pay the bill
Route::get('payment', [
    'as' => 'payment',
    'uses' => 'HomeController@Payment'
]);
//info
Route::get('faqs', [
    'as' => 'faqs',
    'uses' => 'HomeController@Faqs'
]);
Route::get('about', [
    'as' => 'about',
    'uses' => 'HomeController@About'
]);
Route::get('privacy', [
    'as' => 'privacy',
    'uses' => 'HomeController@Privacy'
]);
Route::get('help', [
    'as' => 'help',
    'uses' => 'HomeController@Help'
]);
Route::get('single2', [
    'as' => 'single2',
    'uses' => 'HomeController@Single2'
]);
Route::get('contact', [
    'as' => 'contact',
    'uses' => 'HomeController@Contact'
]);
//Shopping cart
Route::get('add-to-cart/{id?}', [
    'as' => 'add-to-cart',
    'uses' => 'HomeController@AddToCart'
]);
Route::get('delete/{id?}', [
    'as' => 'delete',
    'uses' => 'HomeController@DeleteCart'
]);
Route::get('checkout.html', [
    'as' => 'checkout.html',
    'uses' => 'HomeController@Checkout'
]);
Route::post('checkout', [
    'as' => 'checkout',
    'uses' => 'HomeController@postCheckout'
]);
//user
Route::get('signup', [
    'as' => 'signup',
    'uses' => 'HomeController@SignUp'
]);
Route::get('signin', [
    'as' => 'signin',
    'uses' => 'HomeController@SignIn'
]);
Route::post('signup', [
    'as' => 'signup',
    'uses' => 'HomeController@postSignUp'
]);
Route::post('signin', [
    'as' => 'signin',
    'uses' => 'HomeController@postSignIn'
]);
Route::get('signout', [
    'as' => 'signout',
    'uses' => 'HomeController@postSignOut'
]);
Route::get('profile/{id?}', [
    'as' => 'profile',
    'uses' => 'HomeController@ProfileDetails'
]);
Route::get('updateProfile/{id?}', [
    'as' => 'updateProfile',
    'uses' => 'HomeController@UpdateProfile'
]);
Route::post('makeUpdate/{id?}', [
    'as' => 'makeUpdate',
    'uses' => 'HomeController@makeUpdate'
]);
Route::get('repassword/{id?}', [
    'as' => 'repassword',
    'uses' => 'HomeController@ChangePassword'
]);
Route::post('changePassword/{id?}', [
    'as' => 'changePassword',
    'uses' => 'HomeController@MakeChangePass'
]);
Route::get('Forgot-passsword', [
    'as' => 'Forgot-password',
    'uses' => 'HomeController@FindPassWord'
]);
Route::post('FindPass', [
    'as' => 'FindPass',
    'uses' => 'HomeController@FindPass'
]);
//Search
Route::get('search', [
    'as' => 'search',
    'uses' => 'HomeController@FindProduct'
]);
//admin
Route::get('admin', [
    'as' => 'admin',
    'uses' => 'HomeController@Admin'
]);
Route::post('deleteitem/{id?}', [
    'as' => 'deleteitem',
    'uses' => 'HomeController@DeleteItem'
]);
Route::get('addproduct', [
    'as' => 'addproduct',
    'uses' => 'HomeController@AddProduct'
]);
Route::post('postFile', [
    'as' => 'postFile',
    'uses' => 'HomeController@postFile'
]);
Route::get('update/{id?}', [
    'as' => 'update',
    'uses' => 'HomeController@UpdateProduct'
]);
Route::post('updateProduct', [
    'as' => 'updateProduct',
    'uses' => 'HomeController@UpdateButton'
]);
Route::post('searchList', [
    'as' => 'searchList',
    'uses' => 'HomeController@fetch'
]);
Route::post('validateSignUp', [
    'as' => 'validateSignUp',
    'uses' => 'HomeController@valSignUp'
]);
Route::get('Bill', [
    'as' => 'Bill',
    'uses' => 'HomeController@Bill'
]);
Route::get('DeleteBill/{id?}', [
    'as' => 'DeleteBill',
    'uses' => 'HomeController@DeleteBill'
]);
Route::get('Bill_Details/{id?}', [
    'as' => 'Bill_Details',
    'uses' => 'HomeController@Bill_Details'
]);
Route::get('PDF/{id?}', [
    'as' => 'PDF',
    'uses' => 'HomeController@PDF'
]);
Route::get('UpdateStatus/{id?}', [
    'as' => 'UpdateStatus',
    'uses' => 'HomeController@UpdatePaid'
]);
Route::get('Customer-manager', [
    'as' => 'Customer-manager',
    'uses' => 'HomeController@Customer'
]);
Route::get('DeleteCustomer/{id}', [
    'as' => 'DeleteCustomer',
    'uses' => 'HomeController@DeleteCustomer'
]);
Route::get('Members', [
    'as' => 'Members',
    'uses' => 'HomeController@Member'
]);
Route::get('DeleteUser/{id}', [
    'as' => 'DeleteUser',
    'uses' => 'HomeController@DeleteUser'
]);
Route::post('rating-product', [
    'as' => 'rating-product',
    'uses' => 'HomeController@rating'
]);
Route::get('History', [
    'as' => 'History',
    'uses' => 'HomeController@History'
]);
