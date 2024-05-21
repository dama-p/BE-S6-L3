<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::all();
        /* $books = Book::paginate(); */
        $books = Book::orderBy('created_at', 'DESC')->paginate(12);
        return view('books.index', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->all();
       /*  dd($data); */
        $newBook = new Book();
        $newBook->title = $data['title'];
        $newBook->description = $data['description'];
        $newBook->author = $data['author'];
        $newBook->price = $data['price'];
        $newBook->img = $data['img'];
        $newBook->user_id = $request->user()->id;
        $newBook->save();

        //Reindirizzamento all'index
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        /* dd($book); */
        return view('books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        if (Auth::user()->id !== $book->user_id) abort(401);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        if (Auth::user()->id !== $book->user_id) abort(401);
        $data = $request->all();
      
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->price = $data['price'];
        $book->img = $data['img'];
        $book->update();

      
        return redirect()->route('books.show', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (Auth::user()->id !== $book->user_id) abort(401);
       $book->delete();
       return redirect()->route('books.index');
    }
}
