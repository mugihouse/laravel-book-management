<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        // $books = Book::select('item_name')->get();

        return view('books.index');
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $test = Book::create([
            'item_name' => $request->item_name,
            'item_number' => $request->item_number,
            'item_amount' => $request->item_amount,
            'published' => '2017-03-07 00:00:00'
        ]);

        return to_route('books.index');
    }

    public function edit() {}

    public function update() {}

    public function destroy() {}
}
