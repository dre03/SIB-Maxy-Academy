<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//route resource for products
Route::resource('/products', ProductController::class);

?>