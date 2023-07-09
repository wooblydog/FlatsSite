<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\OfferController;
use App\Models\User;
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


Route::get('/', [IndexController::class, 'index']);

Route::get('/{guid}', [OfferController::class, 'show']);

Route::get('/setup', function () {
    $user_data = [
        'email' => 'admin@admin.ru',
        'password' => 'admin',
    ];

    if (!Auth::attempt($user_data)) {
        $user = new User();
        $user->name = 'admin';
        $user->email = $user_data['email'];
        $user->password = Hash::make($user_data['password']);

        $user->save();

        if (Auth::attempt($user_data)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $defaultToken = $user->createToken('default-token', ['none']);

            return [
                'admin' => $adminToken->plainTextToken,
                'default' => $defaultToken->plainTextToken,
            ];

        }
    }
});

