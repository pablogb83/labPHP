<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
//use App\Entities\Admin;
use Config\Services;

class AdminController extends BaseController
{

	protected $adminModel;

	public function __construct()
	{
		$this->adminModel = new AdminModel($db);
	}

	public function index()
	{
		$request = Services::request();
		$pass=$request->getPost('password');
		$user=$request->getPost('user');
		$admin=$this->adminModel->asArray()->where('password', $pass)
		->where('user',$user)
		->findAll();
		
		if($admin!=null){
		
			echo view('headerAdmin');
			echo view('adminPage');
			echo view('footerAdmin');
		}else{
			return redirect()->to(base_url().'/admin');
		}
	}
}
