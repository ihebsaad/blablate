<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Omnipay\Stripe;
use App\User;
use App\Payment;
use App\Abonnement;
use Carbon\Carbon;
Use DB;

 use Illuminate\Support\Facades\Auth;

 use Swift_Mailer;
 use Mail;
 
class PaymentController extends Controller
{

 public function index()
    {
         return view('abonnements.payment');
    }
 
  public function abonnements()
    {
	   $abonnements= Abonnement::get();

        return view('abonnements.index',['abonnements'=>$abonnements]);
    }
 
 
    public function charge(Request $request)
    {
        if ($request->input('stripeToken')) {
 
            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey(env('STRIPE_SECRET_KEY'));
          
            $token = $request->input('stripeToken');
          
            $response = $gateway->purchase([
                'amount' => $request->input('amount'),
                'currency' => env('STRIPE_CURRENCY'),
                'token' => $token,
            ])->send();
          
            if ($response->isSuccessful()) {
                // payment was successful: insert transaction data into the database
                $arr_payment_data = $response->getData();
                 
                $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();
			
			// cadeau ou paiement normal			
		$userGift= $request->get('usergift');
		 if($userGift!=null){
			 $userid=$userGift;
			$user=User::find($userGift);
		$sender = auth()->user();
			$senderid= $sender['id'];
		$email=$sender['email'];
 		 }else{
		 $cuser = auth()->user();
			$userid= $cuser['id'];
			$user=User::find($userid);		
		$email=	 $request->input('email'):	
		 }


				
          
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->payer_email = $email;
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = env('STRIPE_CURRENCY');
                    $payment->payment_status = $arr_payment_data['status'];
                    $payment->save();
                }
				
		 
			// calcul expiration
		 $format = "Y-m-d H:i:s";
		 if($user->expire==''){
 		 $datee = (new \DateTime())->modify('+30 days')->format($format);	
		}else{
			
		  $newdate = Carbon::createFromFormat('Y-m-d H:i:s', $user->expire);

		 $newdate = $newdate->addDays(30);
		 $datee =  $newdate;			
 	
		}	
			//enregistrement abonnement
			 $abonnement  =  new \App\Abonnement([
              'user' => $userid,
              'details' =>  'id_payment: '.$arr_payment_data['id'],
              'expire' => $datee  ,
             ]);	
		 
		 $abonnement->save();
		 
 		 
		 // Email 
		$message='Bonjour,<br>';
		$message.='Nouvel abonnement sur le site<br>';
 		$message.='<b>Client :</b>  '.$user->username.'<br>'; 
 		$message.='<b>Expiration :</b>  '.$datee.'<br>'; 
		$message.='<b><a href="https://blablate.com/" > blablate.com </a></b>';	
		
 	    $this->sendMail('armand.proservices@gmail.com','Abonnement sur le site',$message)	;
 	    $this->sendMail('ihebsaad@gmail.com','Abonnement sur le site',$message)	;
 
 		User::where('id',$userid)->update(array('expire' => $datee ));

			 if($userGift!=null){
	
		DB::table('messages')->insert(
    ['type' => 'user' ,'from_id' => $senderid , 'to_id' => $userid,'body'=>'🎁 Abonnement blablate'] 
		);
			 }
		  return redirect('/home')->with('success', '  paiement effectué ');

            } else {
                // payment failed: display message to customer
                return $response->getMessage();
            }
        }
		
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
