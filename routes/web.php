<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Device_on_labController;

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EditSDeviceController;
use App\Http\Controllers\EditWDeviceController;
use App\Http\Controllers\HideDeviceController;

use App\Http\Controllers\SendStorageController;
use App\Http\Controllers\BackLabController;

use App\Http\Controllers\LabController;
use App\Http\Controllers\HiddenLabController;

use App\Http\Controllers\StorageLabController;
use App\Http\Controllers\HiddenStorageLabController;

use App\Http\Controllers\WaitingLabController;
use App\Http\Controllers\HiddenWaitingLabController;

use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Redirect;

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
//Authenticate
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login-process', [LoginController::class, 'process'])->name('login-process');
Route::middleware([CheckLogin::class])->group(
    function () {
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');
        // Route::resource('Dashboard', DashboardController::class);
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::resource('Device_on_lab', Device_on_labController::class);

        Route::resource('Device', DeviceController::class);

        Route::resource('Lab', LabController::class);
        Route::resource('HiddenLab', HiddenLabController::class);

        Route::resource('WaitingLab', WaitingLabController::class);
        Route::resource('HiddenWaitingLab', HiddenWaitingLabController::class);

        Route::resource('StorageLab', StorageLabController::class);
        Route::resource('HiddenStorageLab', HiddenStorageLabController::class);

        Route::resource('SendStorage', SendStorageController::class);

        Route::resource('BackLab', BackLabController::class);

        Route::resource('EditSDevice', EditSDeviceController::class);

        Route::resource('EditWDevice', EditWDeviceController::class);

        Route::resource('HideDevice', HideDeviceController::class);

        Route::get('/Export', [HideDeviceController::class, 'Hide']);

        Route::get('/BrokenDevice', [DeviceController::class, 'BrokenDevice']);
        Route::get('/ErrorDevice', [DeviceController::class, 'ErrorDevice']);
        Route::get('/LostDevice', [DeviceController::class, 'LostDevice']);

        Route::post('/Device', [DeviceController::class, 'SearchDate']);
        Route::post('/DateExportDevice', [DeviceController::class, 'SearchDateExport']);
    }
);
