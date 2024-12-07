<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBookRequest;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'asc')->paginate(3);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $test = Book::create([
            'item_name' => $request->item_name,
            'item_number' => $request->item_number,
            'item_amount' => $request->item_amount,
            'published' => '2017-03-07 00:00:00'
        ]);

        return to_route('books.index');
    }

    public function edit($id)
    {
        $book = Book::find($id);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->item_name = $request->item_name;
        $book->item_number = $request->item_number;
        $book->item_amount = $request->item_amount;
        $book->published = $request->published;

        $book->save();

        return to_route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        $book->delete();

        return to_route('books.index');
    }
}
