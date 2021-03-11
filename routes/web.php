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

Route::get('/', [\App\Http\Controllers\PagesController::class, 'getHome'])->name('home');

//ROUTES FOR DRINKS
Route::group(['middleware' => 'auth', 'prefix' => 'drinks'], function (){
    Route::get('/add', [\App\Http\Controllers\PagesController::class, 'getAddDrink'])->name('add-drink');
    Route::get('/list', [\App\Http\Controllers\PagesController::class, 'getDrinks'])->name('list-drinks');
    Route::get('/{id}/edit', [\App\Http\Controllers\DrinkController::class, 'edit']);
    Route::patch('/update', [\App\Http\Controllers\DrinkController::class, 'update'])->name('update-drink');
    Route::delete('/delete/{id}', [\App\Http\Controllers\DrinkController::class, 'destroy'])->name('delete-drink');
    Route::post('/store', [\App\Http\Controllers\DrinkController::class, 'storeDrink'])->name('store-drink');
});


//END ROUTES FOR DRINKS
Route::group(['middleware' => 'auth', 'prefix' => 'measures'], function () {
    Route::get('/add', [\App\Http\Controllers\PagesController::class, 'getAddMeasure'])->name('add-measure');
    Route::get('/list', [\App\Http\Controllers\PagesController::class, 'getListMeasures'])->name('list-measures');
    Route::get('/{id}/edit', [\App\Http\Controllers\PagesController::class, 'getUpdateMeasure']);
    Route::patch('/update', [\App\Http\Controllers\MeasureController::class, 'updateMeasure'])->name('update-measure');
    Route::delete('/delete/{id}', [\App\Http\Controllers\MeasureController::class, 'deleteMeasure'])->name('delete-measure');
    Route::post('/store', [\App\Http\Controllers\MeasureController::class, 'addMeasure'])->name('store-measure');
});
//END ROUTES FOR MEASURES

//ROUTES FOR CURRENT STATES
Route::group(['middleware' => 'auth', 'prefix' => 'current-states'], function () {
    Route::get('/add', [\App\Http\Controllers\PagesController::class, 'getCurrentState'])->name('add-current-state');
    Route::get('/change', [\App\Http\Controllers\PagesController::class, 'getChangeCurrentState'])->name('change-current-state');
    Route::post('/store', [\App\Http\Controllers\CurrentStateController::class, 'storeCurrentState'])->name('store-current-state');
    Route::delete('/delete/{id}', [\App\Http\Controllers\CurrentStateController::class, 'deleteCurrentState'])->name('delete-current-state');

    Route::get('/print',[\App\Http\Controllers\CurrentStateController::class, 'print'])->name('print-current-state');
});
//END ROUTES FOR CURRENT STATES

//ROUTES FOR SALES
Route::group(['middleware' => 'auth', 'prefix' => 'sales'], function () {
    Route::get('/add', [\App\Http\Controllers\PagesController::class, 'getSales'])->name('add-sale');
    Route::patch('/updateSale', [\App\Http\Controllers\SaleController::class, 'updateSale'])->name('update-sale');

});
//END ROUTES FOR SALES

//ROUTES FOR SOLDS
Route::group(['middleware' => 'auth', 'prefix' => 'sold'], function () {
   Route::get('/add', [\App\Http\Controllers\PagesController::class, 'getSolds'])->name('add-sold');
    Route::post('/add', [\App\Http\Controllers\SoldController::class, 'storeSold'])->name('add-sold');

});
//END ROUTES FOR SOLDS


//ROUTES FOR APIs
Route::group(['middleware' => 'auth'], function () {
    Route::post('/storeSale', [\App\Http\Controllers\SaleController::class, 'storeSale'])->name('store-sell');
    Route::get('/getSale', [\App\Http\Controllers\SaleController::class, 'getSale'])->name('get-sell');
    Route::delete('/deleteSale{id}', [\App\Http\Controllers\SaleController::class, 'deleteSale'])->name('delete-sell');
    Route::get('/getCurrentStates', [\App\Http\Controllers\CurrentStateController::class, 'getCurrentStates'])->name('get-current-states');
    Route::get('/getCountSold{id}', [\App\Http\Controllers\SoldController::class, 'countSold']);
    Route::post('/updatePurchasingDrink{id}', [\App\Http\Controllers\CurrentStateController::class, 'updatePurchasingDrink'])->name('update-purchase-drink');
    Route::post('/updateTransferredQuantity{id}', [\App\Http\Controllers\CurrentStateController::class, 'updateTransferredQuantity'])->name('update-transferred-quantity');
    Route::post('/updateTotalSale{id}', [\App\Http\Controllers\CurrentStateController::class, 'updateTotalSale'])->name('update-total-sale');

});


//END FOR APIs

require __DIR__.'/auth.php';
