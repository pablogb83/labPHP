<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
	public function index()
	{
		return view('paginainicio');
	}

	public function loginPage()
	{
		return view('login');
	}

	public function registerPage()
	{
		return view('register');
	}

}
