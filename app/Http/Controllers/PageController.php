<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function about()
    {
        // Ambil data profil perusahaan dari database
        $profile = CompanyProfile::first();

        return view('pages.about', compact('profile'));
    }

    public function products()
    {
        // Ambil data produk dari database (hanya yang aktif)
        $products = Product::where('is_active', true)->latest()->paginate(6);

        return view('pages.products', compact('products'));
    }

    public function news()
    {
        $articles = Article::orderBy('published_at', 'desc')->paginate(3);
        return view('pages.news', compact('articles'));
    }

    public function newsShow($id)
    {
        $article = Article::findOrFail($id);
        return view('pages.news_detail', compact('article'));
    }

    public function productShow($id)
    {
        // Ambil produk yang aktif
        $product = Product::where('is_active', true)->findOrFail($id);
        return view('pages.product_detail', compact('product'));
    }

    public function gallery()
    {
        // Ambil data galeri dengan pagination
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(12);
        return view('pages.gallery', compact('galleries'));
    }
}
