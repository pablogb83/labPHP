<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAutor implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['logueado']) || $_SESSION['logueado']==false){
            echo "NO SESION";
            return redirect()->to(base_url().'/loginpage');
        }
        if(isset($_SESSION['datos_usuario']['tipo']) && $_SESSION['datos_usuario']['tipo']!="autor"){
            echo $_SESSION['datos_usuario']['tipo'];
            echo "ACCESO RESTRINGIDO";
            return redirect()->to(base_url());
        }
        echo "ACA FUNCIONO";
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}