<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Swift_Mailer;
 use Mail;
 use App\User;
use Illuminate\Support\Facades\Auth;

 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('rgbd','contact','sendmessage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
	
	  public function contact()
    {
        return view('contact');
    }
	
	  public function rgbd()
    {
        return view('rgbd');
    }	
	
	
	
		public function sendemail(Request $request)
	{
	  $userid= $request->get('user-email');
 	  $content= $request->get('content');
	  
	  	$id=Auth::user()->id;
        $emetteur = User::find($id);
		
        $destinataire = User::find($userid);

		$message='';
		$message.='<br>Message de '.$emetteur->username.' sur le site Blablate.com<br><br>';
 		$message.='<b>Message:</b> <br>'.$content.'<br><br>';
 		$message.='<a href="https://blablate.com/">Blablate.com</a>';
 		
		$this->sendMail($destinataire->email,'Message de '.$emetteur->username.' sur Blablate',$message);
		$this->sendMail('ihebsaad@gmail.com','Message de '.$emetteur->username.' sur Blablate',$message);
  		 
		return redirect('/chat')->with('success', ' Message envoyé avec succès');

	}
	
	public function sendmessage(Request $request)
	{
	  $email= $request->get('email');
	  $sujet= $request->get('sujet');
	  $contenu= $request->get('contenu');

		$message='';
		$message.='Nouveau Message de contact sur le site<br><br>';
		$message.='<b>Emetteur:</b><br>'.$email.'<br>';
		$message.='<b>Message:</b> <br>'.$contenu.'<br><br>';
 		$message.='<a href="https://blablate.com/">Blablate.com</a>';
 		
		$this->sendMail('ihebsaad@gmail.com',$sujet,$message);
		 $this->sendMail('armand.proservices@gmail.com',$sujet,$message);
		   return redirect('/contact')->with('success', ' Message envoyé avec succès');

	}
 
	
	
		public function sendMail($to,$sujet,$contenu){

		$swiftTransport =  new \Swift_SmtpTransport( \Config::get('mail.host'), \Config::get('mail.port'), \Config::get('mail.encryption'));
        $swiftTransport->setUsername(\Config::get('mail.username')); //adresse email
        $swiftTransport->setPassword(\Config::get('mail.password')); // mot de passe email

        $swiftMailer = new Swift_Mailer($swiftTransport);
		Mail::setSwiftMailer($swiftMailer);
		$from=\Config::get('mail.from.address') ;
		$fromname=\Config::get('mail.from.name') ;
		
		Mail::send([], [], function ($message) use ($to,$sujet, $contenu,$from,$fromname   ) {
         $message
                 ->to($to)
                    ->subject($sujet)
                       ->setBody($contenu, 'text/html')
                    ->setFrom([$from => $fromname]);         

			});
			
 	
	  
	}
	
}
