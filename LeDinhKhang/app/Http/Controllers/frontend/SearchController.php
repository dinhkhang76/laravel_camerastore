<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $list_product = Product::where([['status', '=', '1'], ['name', 'like', $search.'%']])->orderBy('created_at', 'desc')->get();
        return view('frontend.search', compact('list_product'));

         
    }
}
