<?php

    use App\Http\Controllers\Api;
    use App\Http\Controllers\Cattle;
    use App\Http\Controllers\Login;
    use App\Http\Controllers\Logout\Logout;
    use App\Http\Controllers\PrivacyPolicy;
    use App\Http\Controllers\User;
    use App\Http\Controllers\UserPassword;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', Login\Get::class)->name('get');
        Route::post('/', Login\Post::class)->name('post');
    });

    Route::get('/logout', Logout::class)->name('logout');

    Route::group(['middleware' => 'auth.gate'], function () {
        Route::get('/', function () {
            return view('index');
        })->name('homepage');

        Route::prefix('coc')->name('coc.')->group(function () {
            Route::get('', User\Index::class)->name('index');
            Route::get('/create', User\Create::class)->name('create');
            Route::post('', User\Store::class)->name('store');
            Route::get('/{user}/edit', User\Edit::class)->name('edit');
            Route::put('/{user}', User\Update::class)->name('update');
            Route::get('/{user}', User\Show::class)->name('show');
            Route::get('/delete/{user}', User\Delete::class)->name('destroy');
            Route::prefix('password')->name('password.')->group(function () {
                Route::get('{user}/reset', UserPassword\Edit::class)->name('edit');
                Route::put('{user}/reset', UserPassword\Update::class)->name('update');
            });

        });

        Route::prefix('cattle')->name('cattle.')->group(function () {
            Route::get('', Cattle\Index::class)->name('index');
            Route::get('/create', Cattle\Create::class)->name('create');
            Route::post('', Cattle\Store::class)->name('store');
            Route::get('/{cattle}/edit', Cattle\Edit::class)->name('edit');
            Route::put('/{cattle}', Cattle\Update::class)->name('update');
            Route::get('/{cattle}', Cattle\Show::class)->name('show');
            Route::get('/delete/{cattle}', Cattle\Delete::class)->name('destroy');
        });

        Route::prefix('api')->name('api.')->group(function () {
            Route::get('user/search', Api\UserSearch::class)->name('user.search');
            Route::prefix('status')->name('status.')->group(function () {
                Route::get('user/{user}/status', Api\UserStatus::class)->name('user');
                Route::get('cattle/{cattle}/status', Api\CattleStatus::class)->name('cattle');
            });
        });

    });

    Route::get('/privacy-policy', PrivacyPolicy\Get::class);

