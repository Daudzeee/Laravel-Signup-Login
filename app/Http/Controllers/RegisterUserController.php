<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
	public function storeUser(Request $request)
	{
//		$request->validate([
//			'name' => ['required', 'string', 'max:255'],
//			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//			'password' => ['required', 'confirmed', Rules\Password::defaults()],
//			'confirm_password' => ['required', 'confirmed', Rules\Password::defaults()],
//			'phone' => ['required|digits:11']
//		]);

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'confirm_password' => Hash::make($request->password),
			'phone' => $request->phone
		]);
		event(new Registered($user));
	}
}
