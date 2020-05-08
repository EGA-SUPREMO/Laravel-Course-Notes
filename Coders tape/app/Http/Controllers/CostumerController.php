<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostumerController extends Controller
{
    public function index()
	{
		$costumers = \App\Costumer::all();

		return view('costumer.index', compact('costumers'));
	}

	public function create()
	{
		return view('costumer.create');
	}

	public function store()
	{
		$validatedData = request() -> validate([
			'name' => 'required|min:5',
			'email' => 'required|email',
		]);

		\App\Costumer::create($validatedData);

		return redirect('/costumers');
	}
}
