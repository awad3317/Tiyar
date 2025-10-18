<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


Route::get('/', [ProjectController::class, 'showPortfolio'])->name('home');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::resource('projects', ProjectController::class)->except(['index']);

Route::get('/clients', [ServiceController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ServiceController::class, 'create'])->name('clients.create');
Route::post('/clients', [ServiceController::class, 'store'])->name('clients.store');









Route::post('/github/deploy', function (Request $request){
    $secret = '14171417Nn';

        $signature = 'sha256=' . hash_hmac('sha256', $request->getContent(), $secret);
        if (!hash_equals($signature, $request->header('X-Hub-Signature-256'))) {
            Log::warning('Signature mismatch!');
            abort(403, 'Unauthorized');
        }

        exec('cd /home/tiyar/htdocs/Tiyar && git pull origin main');
        return response()->json(['status' => 'Deployed']);
});