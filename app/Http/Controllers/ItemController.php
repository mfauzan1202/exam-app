<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    // private $apiUrl = 'http://localhost:3001/items';
    private $apiUrl = 'https://fakestoreapi.com/products';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $items = $response->json();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.createItems');
    }

    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl, [
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('items.index');
    }

    public function edit($id)
    {
        $response = Http::get($this->apiUrl . '/' . $id);
        $item = $response->json();
        return view('items.editItems', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put($this->apiUrl . '/' . $id, [
            'title' => $request->title,
            'price' => (float) $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $request->image
        ]);

        if ($response->failed()) {
            return back()->withErrors('Failed to update the product.');
        }

        return redirect()->route('items.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        Http::delete($this->apiUrl . '/' . $id);
        return redirect()->route('items.index');
    }
}
