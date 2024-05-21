<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PageController extends Controller
{
    public function homepage()
    {  $books = Book::paginate(3);

        return view('homepage', [
            'books' => $books,
        ]);
    }
}
