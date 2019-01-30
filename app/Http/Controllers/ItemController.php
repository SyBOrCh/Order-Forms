<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = \App\Item::all()->groupBy('category');
        $currentOrder = auth()->user()->currentOrder()->items;

        return view('home.categories', compact('categories', 'currentOrder'));
    }

    public function show($category)
    {
        $order = auth()->user()->currentOrder();

        $items = \App\Item::category($category)->get()->groupBy('action');

        $category = title_case(str_replace('-', ' ', $category));

        return view('items.show', compact('items', 'category', 'order'));
    }
}
