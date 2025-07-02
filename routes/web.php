<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::get('/', [ProjectController::class, 'showPortfolio'])->name('home');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::resource('projects', ProjectController::class)->except(['index']);




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
