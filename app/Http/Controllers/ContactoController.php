<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SendGrid\Mail\Mail;

class ContactoController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|max:500',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $email = new Mail();
        $email->setFrom("no-reply@urhminer.ml", "URH Miner");
        $email->setSubject("Formulario de contacto URH Miner");
        $email->addTo(env('RECEIVER_EMAIL'), "Sebastián");
        $email->addContent(
            "text/html", "<b>Formulario de contacto</b><br>Remitente: $request->nombre ($request->email)<br>Mensaje: $request->mensaje"
        );
        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
        try {
            $sendgrid->send($email);
            return redirect()->route('contacto')->with('success', 'Gracias por escribirnos. Te responderemos a la brevedad.');

        } catch (Exception $e) {
            return redirect()->route('contacto')->with('error', 'Tuvimos un problema al procesar tu mensaje. Por favor, intenta más tarde.');

        }
    }
}
