<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer;

class CostumerController extends Controller
{
    public function index()
	{
		$costumers = Costumer::all();

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

		Costumer::create($validatedData);

		return redirect('/costumers');
	}

	public function show(Costumer $costumer)
	{
		return view('costumer.show', compact('costumer'));
	}
}
