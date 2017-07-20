<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

	public function __construct() 
	{
		$this->middleware('guest')->except('logout');
	}

    public function showLogin()
    {
        return view('login');
    }

	public function login(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|string|email',
			'password' => 'required|string'
		]);

		$email = $request->email;
		$password = $request->password;
		$remember = $request->remember;

		if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
			return redirect()->intended('manage/dashboard');
		} else {
			$errors = ['email' => 'Incorrect Credentials'];
			$request->flashOnly(['email']);
	        return redirect()->back()
	            ->withInput($request->except('password'))
	            ->withErrors($errors);
	        }
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->intended('/');
	}

}