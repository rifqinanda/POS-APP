<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $memberships = Membership::count();
        $categories = Category::count();
        $products = Product::count();
        return view('backend.admin.dashboard', compact('memberships', 'categories', 'products'));
    }

}
