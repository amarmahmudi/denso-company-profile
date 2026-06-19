<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\Gallery;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin dengan ringkasan statistik.
     */
    public function index()
    {
        $totalArticles = Article::count();
        $totalProducts = Product::count();
        $totalGalleries = Gallery::count();

        return view('admin.dashboard', compact('totalArticles', 'totalProducts', 'totalGalleries'));
    }
}
