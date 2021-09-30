<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Swift_Mailer;
 use Mail;
 use App\User;
 use App\Signale;
 use App\Bloc;
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
        $this->middleware('auth')->except('rgbd','contact','sendmessage','signaler');
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
	
	
		
		public function setprefixe(Request $request)
	{
	  $prefixe= $request->get('prefixe');
 	  $id=Auth::user()->id;
	  User::where('id', $id)->update(array('prefixe' => $prefixe));

	  return redirect('/chat')->with('success', ' Enregistré avec succès');

			
	}
	
	
	
	    public function signaler(Request $request)
	{
		  $parid=Auth::user()->id;
	  	  $user=User::where('id',$parid)->first();
      	//  $userid= $request->get('user-signal');
      	  $userid= $request->get('user');
		  
	  	  $user_sign=User::where('id',$userid)->first();

	  $signales=Signale::where('par',$parid)->where('user',$userid)->count();
	  if( $signales==0){
        $signale = new Signale([
             'user' =>  $userid ,
             'par' => $parid 
        ]);
      
	  $signale->save();
 
	  // envoi de mail
		$this->sendMail('ihebsaad@gmail.com','Utilisateur Signalé','  L\'utilisateur <b>'.$user_sign->username.'</b> est signalé par <b>'.$user->username.'</b>');
		$this->sendMail('armand.proservices@gmail.com','Utilisateur Signalé','  L\'utilisateur <b>'.$user_sign->username.'</b> est signalé par <b>'.$user->username.'</b>');
		$this->sendMail(trim($user_sign->email),'Utilisateur Signalé',' Vous êtes signalés par <b>'.$user->username.'</b>');

		}
	}
	
	
	  
		public function bloqueruser(Request $request)
	{
		
		$parid=Auth::user()->id;
	  	  $Par=User::where('id',$parid)->first();
      	//  $userid= $request->get('user-signal');
      	  $userid= $request->get('user');
 	  	  $User=User::where('id',$userid)->first();
		 $now=date('Y-m-d H:i:s');
		if($User->protection > $now){
		
 		 return  back()->withErrors([ 'Utilisateur Protégé !']);


		}else{
		
 	  $blocs=Bloc::where('par',$parid)->where('user',$userid)->count();
	  if( $blocs==0){
        $bloc = new Bloc([
             'user' =>  $userid ,
             'par' => $parid 
        ]);
      
	  $bloc->save();
	  }else{
		  
		 Bloc::where('par',$parid)->where('user',$userid)->delete();
		  
	  }
	    return redirect('/chat')->with('success', 'Utilisateur (Bloqué /Débloqué) avec succès');
		
		}

	}  
	
	  
	  
		public function protection(Request $request)
	{
		
		$id=Auth::user()->id;
	  	$User=User::where('id',$id)->first();
      	$protection=$User->protection;
      	$date=substr($protection, 0, 10) ; 
		$today=date('Y-m-d');
		//$now=date('Y-m-d H:i:s');
		
		// vérifier si protection activée aujourd hui
		if($date!=$today)
		{			 
		 $format = "Y-m-d H:i:s";
  		 $datep = (new \DateTime())->modify('+1 hour')->format($format);
		 User::where('id',$id)->update(array('protection' => $datep));
			
		return redirect('/chat')->with('success', 'Protection activée !');
		}
		else
		{
		//return redirect('/chat')->with('danger', 'Protection deja activée pour ce jour !');	
		return  back()->withErrors([ 'Protection deja activée pour ce jour !']);

		}
		

	}  	  
	  
	  
	public function sendmessage(Request $request)
	{
		
 $request->validate([
    'email' => 'required',
    'sujet' => 'required',
    'contenu' => 'required',
	'captcha'=>'required|captcha'
]);

	  $email= $request->get('email');
	  $sujet= $request->get('sujet');
	  $contenu= $request->get('contenu');

		$message='';
		$message.='Nouveau Message de contact sur le site<br><br>';
		$message.='<b>Emetteur:</b><br>'.$email.'<br>';
		$message.='<b>Message:</b> <br>'.$contenu.'<br><br>';
 		$message.='<a href="https://blablate.com/">Blablate.com</a>';
 		
	//	$this->sendMail('ihebsaad@gmail.com',$sujet,$message);
		 $this->sendMail('armand.proservices@gmail.com',$sujet,$message);
		 $this->sendMail('blablate.com@gmail.com',$sujet,$message);
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
