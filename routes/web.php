<?php

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

Route::group(['namespace' => 'App\Http\Controllers\Web'], function() {

    Route::group(['middleware' => 'localization'], function () {

        Route::get('/', ['uses'=>'HomeController@index'])->name('home');
        Route::get('/change-language/{language}', 'HomeController@changeLanguage')->name('change_language');
        Route::post('/apartment-info', 'HomeController@getApartmentInfo')->name('apartment_info');
        Route::get('/thong-tin-can-ho', ['uses'=>'ApartmentController@index'])->name('apartment');
        Route::get('/tien-ich', ['uses'=>'UtilityController@index'])->name('tienich');
        Route::get('/thu-vien', ['uses'=>'GalleryController@index'])->name('gallery');
        Route::get('/tin-tuc', ['uses'=>'NewsController@index'])->name('news');
        Route::get('/tin-tuc-chi-tiet/{id?}', ['uses'=>'NewsController@detail'])->name('news_detail');
        Route::get('/tien-do', ['uses'=>'ProgressController@index'])->name('progress');
        Route::get('/lancaster-by-trungthuy', ['uses'=>'LancasterController@index'])->name('lancaster');
    });
    



});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('talent-users')->name('talent-users/')->group(static function() {
            Route::get('/',                                             'TalentUsersController@index')->name('index');
            Route::get('/create',                                       'TalentUsersController@create')->name('create');
            Route::post('/',                                            'TalentUsersController@store')->name('store');
            Route::get('/{talentUser}/edit',                            'TalentUsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TalentUsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{talentUser}',                                'TalentUsersController@update')->name('update');
            Route::delete('/{talentUser}',                              'TalentUsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tags')->name('tags/')->group(static function() {
            Route::get('/',                                             'TagsController@index')->name('index');
            Route::get('/create',                                       'TagsController@create')->name('create');
            Route::post('/',                                            'TagsController@store')->name('store');
            Route::get('/{tag}/edit',                                   'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}',                                       'TagsController@update')->name('update');
            Route::delete('/{tag}',                                     'TagsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('films')->name('films/')->group(static function() {
            Route::get('/',                                             'FilmsController@index')->name('index');
            Route::get('/create',                                       'FilmsController@create')->name('create');
            Route::post('/',                                            'FilmsController@store')->name('store');
            Route::get('/{film}/edit',                                  'FilmsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FilmsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{film}',                                      'FilmsController@update')->name('update');
            Route::delete('/{film}',                                    'FilmsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('companies')->name('companies/')->group(static function() {
            Route::get('/',                                             'CompanyController@index')->name('index');
            Route::get('/create',                                       'CompanyController@create')->name('create');
            Route::post('/',                                            'CompanyController@store')->name('store');
            Route::get('/{company}/edit',                               'CompanyController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CompanyController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{company}',                                   'CompanyController@update')->name('update');
            Route::delete('/{company}',                                 'CompanyController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostsController@index')->name('index');
            Route::get('/create',                                       'PostsController@create')->name('create');
            Route::post('/',                                            'PostsController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostsController@update')->name('update');
            Route::delete('/{post}',                                    'PostsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('events')->name('events/')->group(static function() {
            Route::get('/',                                             'EventsController@index')->name('index');
            Route::get('/create',                                       'EventsController@create')->name('create');
            Route::post('/',                                            'EventsController@store')->name('store');
            Route::get('/{event}/edit',                                 'EventsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EventsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{event}',                                     'EventsController@update')->name('update');
            Route::delete('/{event}',                                   'EventsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('cities')->name('cities/')->group(static function() {
            Route::get('/',                                             'CitiesController@index')->name('index');
            Route::get('/create',                                       'CitiesController@create')->name('create');
            Route::post('/',                                            'CitiesController@store')->name('store');
            Route::get('/{city}/edit',                                  'CitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{city}',                                      'CitiesController@update')->name('update');
            Route::delete('/{city}',                                    'CitiesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('films')->name('films/')->group(static function() {
            Route::get('/',                                             'FilmsController@index')->name('index');
            Route::get('/create',                                       'FilmsController@create')->name('create');
            Route::post('/',                                            'FilmsController@store')->name('store');
            Route::get('/{film}/edit',                                  'FilmsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FilmsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{film}',                                      'FilmsController@update')->name('update');
            Route::delete('/{film}',                                    'FilmsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pages')->name('pages/')->group(static function() {
            Route::get('/',                                             'PagesController@index')->name('index');
            Route::get('/create',                                       'PagesController@create')->name('create');
            Route::post('/',                                            'PagesController@store')->name('store');
            Route::get('/{page}/edit',                                  'PagesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PagesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{page}',                                      'PagesController@update')->name('update');
            Route::delete('/{page}',                                    'PagesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('registrations')->name('registrations/')->group(static function() {
            Route::get('/',                                             'RegistrationsController@index')->name('index');
            Route::get('/create',                                       'RegistrationsController@create')->name('create');
            Route::post('/',                                            'RegistrationsController@store')->name('store');
            Route::get('/{registration}/edit',                          'RegistrationsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RegistrationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{registration}',                              'RegistrationsController@update')->name('update');
            Route::delete('/{registration}',                            'RegistrationsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('blocks')->name('blocks/')->group(static function() {
            Route::get('/',                                             'BlocksController@index')->name('index');
            Route::get('/create',                                       'BlocksController@create')->name('create');
            Route::post('/',                                            'BlocksController@store')->name('store');
            Route::get('/{block}/edit',                                 'BlocksController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BlocksController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{block}',                                     'BlocksController@update')->name('update');
            Route::delete('/{block}',                                   'BlocksController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('proles')->name('proles/')->group(static function() {
            Route::get('/',                                             'ProlesController@index')->name('index');
            Route::get('/create',                                       'ProlesController@create')->name('create');
            Route::post('/',                                            'ProlesController@store')->name('store');
            Route::get('/{prole}/edit',                                 'ProlesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProlesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{prole}',                                     'ProlesController@update')->name('update');
            Route::delete('/{prole}',                                   'ProlesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('experiences')->name('experiences/')->group(static function() {
            Route::get('/',                                             'ExperienceController@index')->name('index');
            Route::get('/create',                                       'ExperienceController@create')->name('create');
            Route::post('/',                                            'ExperienceController@store')->name('store');
            Route::get('/{experience}/edit',                            'ExperienceController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ExperienceController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{experience}',                                'ExperienceController@update')->name('update');
            Route::delete('/{experience}',                              'ExperienceController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('homepages')->name('homepages/')->group(static function() {
            Route::get('/',                                             'HomepageController@index')->name('index');
            Route::get('/create',                                       'HomepageController@create')->name('create');
            Route::post('/',                                            'HomepageController@store')->name('store');
            Route::get('/{homepage}/edit',                              'HomepageController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'HomepageController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{homepage}',                                  'HomepageController@update')->name('update');
            Route::delete('/{homepage}',                                'HomepageController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('block-infos')->name('block-infos/')->group(static function() {
            Route::get('/',                                             'BlockInfoController@index')->name('index');
            Route::get('/create',                                       'BlockInfoController@create')->name('create');
            Route::post('/',                                            'BlockInfoController@store')->name('store');
            Route::get('/{blockInfo}/edit',                             'BlockInfoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BlockInfoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{blockInfo}',                                 'BlockInfoController@update')->name('update');
            Route::delete('/{blockInfo}',                               'BlockInfoController@destroy')->name('destroy');
        });
    });
});