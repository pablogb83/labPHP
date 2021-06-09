<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $table = 'usuarios';

    public function autor()
    {
        return $this->hasOne(Autor::class);
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function enviarEmail($nick)
    {
        $email = \Config\Services::email();

        $email->setFrom('truchameophplab@gmail.com', 'Truchameo');
        $email->setTo('truchameophplab@gmail.com');
        //$email->setCC('another@another-example.com');
        //$email->setBCC('them@their-example.com');

        $email->setSubject('Suscripcion a Truchameo');
        $email->setMessage('Se a registrado correctamente ' . $nick);

        //$email->print_debugger();
        $email->send(); 
    }
}
