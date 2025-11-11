<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController
{
	public function index()
	{
		return view('contact');
	}

	public function send(Request $request)
	{
		// Validar los datos
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email',
			'message' => 'required|string|min:10',
		]);

		// Enviar el email
		Mail::raw($request->message, function ($message) use ($request) {
			$message->to('tomas@bookbag.com')
				->subject('Nuevo mensaje de contacto')
				->from($request->email, $request->name);
		});

		return back()->with('success', 'Tu mensaje se ha enviado correctamente.');
	}
}
