<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterCompartidas implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['datos_usuario']['tipo']) && $_SESSION['datos_usuario']['tipo']=="admin"){
            echo $_SESSION['datos_usuario']['tipo'];
            echo "ACCESO RESTRINGIDO";
            /*echo view('headerAdmin');
            echo view('adminPage');
            echo view('footerAdmin');*/
        return redirect()->to(base_url().'/adminPage');
        }
        //echo "SESION ACTIVA";
        //return redirect()->to(base_url());
        

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}