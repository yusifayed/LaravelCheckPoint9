<?php

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */
// //1. echo langsung nested
// Route::get('/home', function () {
//     return view('ghufron');
// });
// Route::get('/asku', function () {
//     //return view('welcome'); 
//     echo "I love Me";
// });
// Route::get('/Mom', function () {
//     //return view('welcome'); 
//     echo "I love Mom";
// });
// Route::get('/Dad', function () {
//     //return view('welcome'); 
//     echo "I love Dad";
// });
// Route::get('/One', function () {
//     //return view('welcome'); 
//     echo "One";
// });
// Route::get('/Two', function () {
//     //return view('welcome'); 
//     echo "Two";
// });
// Route::get('/Three', function () {
//     //return view('welcome'); 
//     echo "Three";
// });
// Route::get('/Four', function () {
//     //return view('welcome'); 
//     echo "Four";
// });
// Route::get('/Five', function () {
//     //return view('welcome'); 
//     echo "Five";
// });
// Route::get('/Six', function () {
//     //return view('welcome'); 
//     echo "Six";
// });
// Route::get('/Why', function () {
//     //return view('welcome'); 
//     echo "Why you kill me? ";
// });
// //2, manggil view
// Route::get('/hiya', function(){
//     return view('template');
//     //Lokasi view
// });
// //3. Manggil Controller
// Route::get('/usang','UsangController@index');  
// /* file controllernya namanya usangController 
//     nama url usang
//     index nama functionnya
// */
// Route::get('/jeruk','UsangController@godog');

Route::get('/CleaningService','CleanerController@index');
Route::resource('kontak','Kontak');
Route::get('/index',function(){
    return view('index');

});
Route::get('/login','Login@index');
Route::post('/login/cek','Login@cek');
Route::get('/logout','Login@logout');
Route::get('/','Dashboard@index');
Route::resource('kato','kota');
Route::resource('barang','barang');
Route::resource('jual','penjualan');
Route::resource('beli','pembelian');

// Route::get('/kontak','Kontak@index');
