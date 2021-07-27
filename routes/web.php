<?php

use App\Http\Middleware\CheckUserType;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group([
    'namespace' => 'website',
    'as' => 'website.'
],function (){
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/الخدمات/{slug}', 'ServicesController@index')->name('services');
    Route::get('/من-نحن', 'HomeController@about')->name('about');
    Route::get('/المدونة', 'BlogsController@index')->name('blog');
    Route::get('/المدونة/{slug}', 'BlogsController@detail')->name('blog-d');
    Route::get('/فريق-العمل', 'TeamControllers@index')->name('team');
    Route::get('/التوظيف', 'JoinjobsController@index')->name('job');
    Route::get('/أعمالنا', 'WorksController@index')->name('works');
    Route::get('/تواصل-معنا', 'ContactController@index')->name('contact');
    Route::get('/سياسة-الخصوصية', 'PrivacyController@privacy')->name('privacy');
    Route::get('/الشروط-و-الأحكام', 'PrivacyController@tearms')->name('tearms');
    Route::get('/مجموعة-الشركات', 'GroupController@index')->name('group');






});

Route::group([
    'namespace' => 'admin',
    'prefix'=> 'admin',
    'as' => 'admin.',
   'middleware' => ['auth', CheckUserType::class]
],function (){
    Route::resource('users', 'UsersController');
    Route::resource('tags', 'TagsController');
    Route::resource('sliders', 'slidersController');
    Route::resource('services', 'ServicesController');
    Route::resource('subservises', 'SubservisesController');
    Route::resource('features', 'FeaturesController');
    Route::resource('works','WorksController');
    Route::resource('advertisings', 'AdvertisingsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('blogs', 'BlogsController');
    Route::resource('team', 'TeamsController');
    Route::resource('orders', 'HowtoOrderController');
    Route::resource('about-us', 'AboutusController');
    Route::resource('groups', 'GroupController');


    Route::post('job', 'JoinjobsController@store')->name('job');
    Route::post('contact', 'ContactController@store')->name('contact');


});
Route::get('blog', 'admin\BlogsController@Cuscreate')->name('admin.blog');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
