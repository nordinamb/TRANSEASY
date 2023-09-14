<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BusController ;
use App\Http\Controllers\VoyageController ;
use App\Http\Controllers\PlaceController ;
use App\Http\Controllers\CheckoutController ;
use App\Http\Controllers\QRCodeController ;
use \App\Http\Middleware\Authenticate ;



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

Route::get('/', function () {
   $cities = [
        "Casablanca",
        "Rabat",
        "Marrakesh",
        "Fes",
        "Tangier",
        "Salé",
        "Meknes",
        "Agadir",
        "Oujda",
        "Kenitra",
        "Tetouan",
        "Temara",
        "Safi",
        "Mohammedia",
        "Khouribga",
        "El Jadida",
        "Beni Mellal",
        "Aït Melloul",
        "Nador",
        "Taza",
        "Khémisset",
        "Béni Khiar",
        "Fkih Ben Salah",
        "Taourirt",
        "Tiznit",
        "Oued Zem",
        "Sidi Slimane",
        "Sidi Kacem",
        "Essaouira",
        "Tan-Tan"
    ];
    return view('welcome',compact('cities'));
})->name('first');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('Bus/createFormulaire','index')->middleware(Authenticate::class);



Route::resource('voyage',VoyageController::class)->only(['index','create','edit', 'store','destroy','more','update'])->middleware(Authenticate::class);
Route::get('voyage/show',[VoyageController::class,'show']) ;
Route::resource('place', PlaceController::class);
Route::resource('{id}/checkout',CheckoutController::class) ;
// Route::resource('{id}/edite/place', PlaceController::class);
Route::get('/isvalid',[CheckoutController::class,'show']) ;


Route::resource('{token}/ticket',QRCodeController::class) ;
// Route::get('qrcode/scan', [QRCodeController::class, 'scan'])->name('qrcode.scan');

Route::post('/scan-qr-code', [QRCodeController::class,'scanQRCode'])->name('scan-qr-code');


Route::get('/toscan', function () {
    return view('qrcode.scanQrCode');
});

Route::post('voyage/moreinfo/{seat}/{price}', function ($seat, $price) {
    $data = ['seat' => $seat, 'price' => $price];
    return view('admin.more', compact('data'));
})->name('moreinfo');

