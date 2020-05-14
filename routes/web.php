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
// Home Route
Route::get('/','HomeController@index')->name('home');
Route::get('/profil','HomeController@profil')->name('profil');
Route::get('/geografis','HomeController@geografis')->name('geografis');
Route::get('/visimisi','HomeController@visimisi')->name('visimisi');
Route::get('/foto/{id}','HomeController@foto')->name('foto');
Route::post('/daftar-kabupaten','AdminController@getKabupaten')->name('get-kabupaten');
Route::get('/send-wa/{id}','PengurusController@sendWa')->name('send-wa');
Route::get('/coba/tele','HomeController@sendMessage')->name('telegram');

Route::group(['prefix' => 'admin', 'middleware' => ['cekadmin','auth'] ], function()
{   
    Route::get('/','AdminController@index')->name('admin');
    Route::get('/daftar-santri','AdminController@DaftarSantri')->name('daftar-santri');
    Route::post('/post-daftar-santri','AdminController@PostSantri')->name('post-daftar-santri');
    Route::get('/show-daftar-santri/{id}','AdminController@ShowSantri')->name('show-daftar-santri');
    Route::post('/put-daftar-santri','AdminController@PutSantri')->name('put-daftar-santri');
    Route::get('/delete-daftar-santri/{id}','AdminController@DeleteSantri')->name('delete-daftar-santri');
    Route::post('/add-daftar-mapel','AdminController@addMapel')->name('add-daftar-mapel');
    Route::get('/delete-daftar-mapel/{id}','AdminController@DeleteMapel')->name('delete-daftar-mapel');
    Route::get('/reset-password/{id}','AdminController@Reset')->name('resetpassword');
    Route::post('/import-santri','AdminController@ImportSantri')->name('import-santri');
});

Route::group(['prefix' => 'santri', 'middleware' => ['ceksantri','auth'] ], function()
{   
    Route::get('/','SantriController@index')->name('santri');
    Route::get('/change-password','SantriController@changePassword')->name('change-password');
    Route::post('/change-password','SantriController@updatePassword')->name('password-update');
    Route::get('/edit-data/{id}','SantriController@editData')->name('edit-data');
    Route::post('/put-data','SantriController@putData')->name('santri.put-data');
    Route::get('/perijinan','SantriController@perijinan')->name('perijinan');
    Route::post('/post-perijinan','SantriController@Createperijinan')->name('create-perijinan');
    Route::get('/edit-perijinan','SantriController@editPerijinan')->name('santri-edit-perijinan');
    Route::post('/put-perijinan','SantriController@putPerijinan')->name('santri-put-perijinan');
    Route::get('/delete-perijinan/{id}','SantriController@deletePerijinan')->name('santri-delete-perijinan');
    Route::get('/cetak-perijinan/{id}','SantriController@cetakPerijinan')->name('santri-cetak-perijinan');
});

Route::group(['prefix' => 'pengurus', 'middleware' => ['cekpengurus','auth'] ], function()
{   
    Route::get('/','PengurusController@index')->name('pengurus');
    Route::get('/edit-data/{id}','PengurusController@editData')->name('edit-pengurus');
    Route::post('/post-data','PengurusController@postData')->name('post-pengurus');
    Route::get('/perijinan','PengurusController@perijinan')->name('menu-perijinan');
    Route::get('/edit-perijinan/','PengurusController@editPerijinan')->name('pengurus-edit-perijinan');
    Route::post('/put-perijinan','PengurusController@putPerijinan')->name('pengurus-put-perijinan');
    Route::get('/delete-perijinan/{id}','PengurusController@deletePerijinan')->name('delete-perijinan');
    Route::get('/send-wa/{id}','PengurusController@sendWa')->name('send-wa');
});



Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('keluar');

