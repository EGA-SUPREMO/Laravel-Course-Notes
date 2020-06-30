<?php

namespace App\Http\Controllers;

use App\Costumer;
use App\Mail\WelcomeMail;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class CostumerController extends Controller
{
	public function index(Request $request)
	{
		$isActive = $request->query('active', 1);
		$costumers = Costumer::byActivity($isActive) -> get();//first(); for one element
		// get() returns a fancy array
		// find() you can pass an int to get one row by id

		return view('costumer.index', compact('costumers'));
	}

	public function create()
	{
		$costumer = new Costumer();

		return view('costumer.create', compact('costumer'));
	}

	public function store()
	{
		$extraRules = [ Rule::unique('costumers') ];

		$costumer = Costumer::create($this->validatedData($extraRules));
		$this->storeImage($costumer);

		try {//I know I know, there're better ways and this is only for testing
			Mail::to($costumer->email)->send(new WelcomeMail($costumer));
		} catch (\Swift_TransportException $ignored) { }

		session() -> flash('message', 'Thanks for sign up, we\'ll be in touch :)');
		session() -> flash('reflash', 'first time');
		
		return redirect('/costumers') /*-> with('message', 'Thanks for sign up, we\'ll be in touch :)')*/;
	}

	public function show(Costumer $costumer)
	{//Costumer::findOrFail('costumer'); //In case it doesn't find it show the 404 Page
		return view('costumer.show', compact('costumer'));
	}
	public function edit(Costumer $costumer)
	{//Costumer::findOrFail('costumer'); //In case it doesn't find it, it shows the 404 Page
		return view('costumer.edit', compact('costumer'));
	}
	public function update(Costumer $costumer)
	{
		$extraRules = [ Rule::unique('costumers')->ignore($costumer->id) ];
		$costumer -> update($this->validatedData($extraRules));
		$this->storeImage($costumer);

		return redirect('/costumers');
	}
	public function destroy(Costumer $costumer)
	{
		$costumer->delete($costumer);
		
		return redirect('/costumers');
	}
	/*
	 * Validates the data from requests using the specified rules the rules from the parameters.
	 *
	 */
	public function validatedData(array $extraRules)
	{
		return request() -> validate([
			'name' => array_merge([
				'required',
				'min:5',
			], $extraRules),
			'email' => array_merge([
				'required',
				'email',
				'min:5',
			], $extraRules),
			'image' => [
				'file',
				'image',
				'max:5000',
			],
		]);
	}
	public function storeImage(Costumer $costumer)
	{
		if(request()->has('image')) {
			$costumer->update([
				'image' => request()->image->store('uploads', 'public'),
			]);

			$image = Image::make(public_path('/storage'. $costumer->image))->fit(300, 300);
			$Image->save();
		}
	}
}
