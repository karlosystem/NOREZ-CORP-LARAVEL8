<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Servicios;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contactenos.index', [
            'servicios_menu' => Servicios::where('status', 'publish')
                                        ->where('destacado', 'si')
                                        ->get()           
        ]);
    }

    public function lista(){
        return view('contactenos.listado', [
             'contactenos_todo' => Contacto::all() 
        ]);
    }

    public function sendEmail(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:60',
                'email' => 'required|email',
                'celular' => 'required',
                'message' => 'required',
            ],
            [],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $data = [
            'name'=>$request->name,
            'celular'=>$request->celular,
            'email'=>$request->email,
            'message'=>$request->message,
        ];

       /*  $mail_body = view('email-templates.contact-message-template', $data);
        $mail_config = [
            'from_address'=>$request->email,
            'from_name'=>$request->name,

        ]; */

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        // Email server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'myemail@gmail.com';   //  sender username
        $mail->Password = '123';       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465

        $mail->setFrom($email, 'RJ');
        $mail->addAddress('myemail@gmail.com');

    }

}
