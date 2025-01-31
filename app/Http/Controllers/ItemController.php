<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    // private $apiUrl = 'http://localhost:3001/items';
    private $apiUrl = 'https://shrimo.com/fake-api/todos';

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
        $tags = explode(',', $request->input('tags'));
        $tags = array_map('trim', $tags);

        $response = Http::post($this->apiUrl, [
            'title' => $request->title,
            'description' => $request->description,
            'dueDate' => $request->dueDate,
            'priority' => $request->priority,
            'status' => $request->status,
            'tags' => $tags,
        ]);

        if ($response->failed()) {
            dd($response->json());
        }

        return redirect()->route('items.index')->with('success', 'Item created successfully!');
    }

    public function edit($id)
    {
        $response = Http::get($this->apiUrl . '/' . $id);
        $item = $response->json();
        return view('items.editItems', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $tags = explode(',', $request->input('tags'));
        $tags = array_map('trim', $tags);

        $response = Http::put($this->apiUrl . '/' . $id, [
            'title' => $request->title,
            'description' => $request->description,
            'dueDate' => $request->dueDate,
            'priority' => $request->priority,
            'status' => $request->status,
            'tags' => $tags,
        ]);

        if ($response->failed()) {
            dd($response->json());
        }

        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }

    public function destroy($id)
    {
        Http::delete($this->apiUrl . '/' . $id);
        return redirect()->route('items.index');
    }
}
