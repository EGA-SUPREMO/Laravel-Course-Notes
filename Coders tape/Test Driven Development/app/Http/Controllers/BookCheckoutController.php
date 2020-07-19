<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookCheckoutController extends Controller
{
    public function store(Book $book)
    {
        $book->checkout(auth()->user());
    }
}
