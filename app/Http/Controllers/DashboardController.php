<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $currentYear = Carbon::now()->year;
        $totalProductCurrentYear = Product::where('created_at', $currentYear)->count();
        $highestPrice = Product::max('price');
        $totalCustomers = Pelanggan::all()->count();
        $customersThisYear = Pelanggan::whereYear('created_at', $currentYear)->count();
        $products = Product::take(5)->get();
        $percentage = ($customersThisYear / $totalCustomers) * 100;

        return view('pages.index', [
            'title' => 'Dashboard',
            'totalProductCurrentYear' => $totalProductCurrentYear,
            'products' => $products,
            'highestPrice' => $highestPrice,
            'customersThisYear' => $customersThisYear,
            'percentage' => $percentage
            
        ]);
     }
}
