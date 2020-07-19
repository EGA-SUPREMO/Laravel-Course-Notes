<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BookCheckoutController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Book $book)
    {
        $book->checkout(auth()->user());
    }
}
