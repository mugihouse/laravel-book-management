<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(3);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $file = $request->file('item_img');

        if (!empty($file)) {
            $filename = $file->getClientOriginalName();
            $move = $file->move('../public/upload/', $filename);
        } else {
            $filename = '';
        }

        $test = Book::create([
            'user_id' => Auth::user()->id,
            'item_name' => $request->item_name,
            'item_number' => $request->item_number,
            'item_amount' => $request->item_amount,
            'item_img' => $filename,
            'published' => '2017-03-07 00:00:00'
        ]);

        return to_route('books.index')->with('message', '本登録が完了しました');
    }

    public function edit($id)
    {
        $book = Book::where('user_id', Auth::user()->id)->find($id);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::where('user_id', Auth::user()->id)->find($id);

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
