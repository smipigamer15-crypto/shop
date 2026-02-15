<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::all();

        return view('products.index', compact('products'));
    }









    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Доступ заборонено');
        }

        return view('products.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Доступ заборонено');
        }

        // логіка збереження продукту
    }








    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Товар успішно видалено!');
    }
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Товар успішно оновлено!');
    }
}

