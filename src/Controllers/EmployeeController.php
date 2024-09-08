<?php
namespace Taller2\Controllers;
require_once '../vendor/autoload.php';

use Taller2\Models\Employee;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

    class EmployeeController{

        //Atributos
        private $jsonFile;

        //Magic Methods
        public function __construct(string $jsonFile){            
            $this->jsonFile = $jsonFile;
        }
        public function readJsonFile(){
            return json_decode(
                file_get_contents($this->jsonFile), true
            );
        }

        public function add(Employee $employee){
            $employees = $this->readJsonFile($this->jsonFile);
            $employees[] = $employee->toArray();
            file_put_contents($this->jsonFile, json_encode($employees));
            $this->notifyEmail($employee);
        }

        public function notifyEmail($employee){
            $transport = (new Swift_SmtpTransport('sandbox.smtp.mailtrap.io', 2525))
            ->setUsername('f6f70e1d3146b1')
            ->setPassword('96180452f39cbf');

            $mailer = new Swift_Mailer($transport);

            // Crear el mensaje
            $message = (new Swift_Message('Empleado Nuevo'))
            ->setFrom(['from_juan.gabelo27217@ucaldas.edu.co' => 'Nombre Remitente'])
            ->setTo(['recipient_juan.gabelo@prueba.com' => 'Nombre Destinatario'])
            ->setBody('Bienvenido!');

            $result = $mailer->send($message);

            if ($result) {
            echo 'Correo enviado exitosamente.';
            } else {
            echo 'Hubo un problema al enviar el correo.';
            }
        }
    }

?>