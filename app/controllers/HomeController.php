<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    protected $layout = 'layouts.master';
    
    public function dashboard()
    {
        $this->layout->content = View::make('dashboard.index')->withTitle('Dashboard');
    }
	
	public function authenticate()
	{
		//ambil credentials dari $POST variable 
		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
		);
		try
		{
			//authentikasi user 
			$user = Sentry::authenticate($credentials, false);
			//redirect user ke dashboard
			return Redirect::intended('dashboard');
		}
		
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return Redirect::back()->with('errorMessage','Password Yang Anda Masukkan Salah');
		}
		catch (Exception $e)
		{
			//kembalikan user ke halaman login
			return Redirect::back()->with('errorMessage',trans('Akun Dengan Email Tersebut tidak di temukan di sistem kami'));
		}
	}
	
	//fungsi logout
	public function logout()
	{
		//logout user
		Sentry::logout();
		//redirect kehalaman login
		return Redirect::to('login')->with('successMessage','Anda Berhasi Logout');
	}
}
