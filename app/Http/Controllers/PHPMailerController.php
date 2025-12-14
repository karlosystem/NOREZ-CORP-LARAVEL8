<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Contacto;

class PHPMailerController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:60',
            'email' => 'required|email',
            'celular' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

         //grabar
        DB::beginTransaction();
        try {
            Contacto::create([
                'nombres' => $request->name,
                'email' => $request->email,
                'telefono' => $request->celular,
                'consulta' => $request->message,
            ]);           
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        } finally {
            DB::commit();
        }

        $mail = new PHPMailer(true);

        try {
            // DEBUG (ver errores reales)
            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';

            $mail->isSMTP();
            $mail->Host = config('mail.mailers.smtp.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');
            $mail->Port = config('mail.mailers.smtp.port');

            // SSL correcto
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            $mail->setFrom(
                config('mail.from.address'),
                config('mail.from.name')
            );

            // 👉 TU correo, NO el del formulario
            $mail->addAddress(config('mail.from.address'));

            // Responder al usuario
            $mail->addReplyTo($request->email, $request->name);

            $mail->isHTML(true);
            $mail->Subject = 'Mensaje desde la web de Norez Corp';

            $mail->Body = "
                <h3>Nuevo mensaje desde la pagina web</h3>
                <p><b>Nombre:</b> {$request->name}</p>
                <p><b>Celular:</b> {$request->celular}</p>
                <p><b>Email:</b> {$request->email}</p>
                <p><b>Mensaje:</b><br>{$request->message}</p>
            ";

            $mail->send();

            return back()->with('success', 'Correo enviado correctamente');

        } catch (Exception $e) {
            return back()->withErrors([
                'smtp' => $mail->ErrorInfo
            ]);
        }
    }
}
