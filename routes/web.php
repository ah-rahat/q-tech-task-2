<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;
Route::get('/', function () {
return view('welcome');
});
Route::middleware([
'auth:sanctum',
config('jetstream.auth_session'),
'verified',
])->group(function () {
Route::get('/dashboard', function () {
return view('dashboard');
})->name('dashboard');

Route::post('/shorten', [UrlShortenerController::class, 'shorten'])->name('shorten');
Route::get('/{shortCode}', [UrlShortenerController::class, 'redirect'])->name('redirect');
Route::get('/count_click/table', [UrlShortenerController::class, 'count_click'])->name('count_click');
});