<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Http\Requests\ContactoRequest;
use SendGrid\Mail\Mail;

class ContactoController extends Controller
{
    public function procesarFormulario(ContactoRequest $request)
    {
        $this->guardarContactoEnBD($request->all());
        $this->enviarEmail($request->nombre, $request->email, $request->mensaje);
                    return redirect()->route('contacto')->with('success', 'Gracias por escribirnos. Te responderemos a la brevedad.');
    }

    private function enviarEmail($nombre, $emailDestino, $mensaje)
    {
        $email = new Mail();
        $email->setFrom("no-reply@urhminer.ml", "URH Miner");
        $email->setSubject("Formulario de contacto URH Miner");
        $email->addTo(env('RECEIVER_EMAIL'), "Sebastián");
        $email->addContent(
            "text/html", "<b>Formulario de contacto</b><br>Remitente: $nombre ($emailDestino)<br>Mensaje: $mensaje"
        );
        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
        try {
            $sendgrid->send($email);
            return redirect()->route('contacto')->with('success', 'Gracias por escribirnos. Te responderemos a la brevedad.');

        } catch (Exception $e) {
            return redirect()->route('contacto')->with('error', 'Tuvimos un problema al procesar tu mensaje. Por favor, intenta más tarde.');

        }
    }

    private function guardarContactoEnBD(array $all)
    {
        $contacto = Contacto::create($all);
    }
}
