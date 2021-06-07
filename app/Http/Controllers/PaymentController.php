<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Omnipay\Stripe;
use App\User;
use App\Payment;
use App\Abonnement;
use Carbon\Carbon;


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
				
				
          
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->payer_email = $request->input('email');
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = env('STRIPE_CURRENCY');
                    $payment->payment_status = $arr_payment_data['status'];
                    $payment->save();
                }
			
		 $cuser = auth()->user();
			$userid= $cuser['id'];
			$user=User::find($userid);
			// calcul expiration
		 $format = "Y-m-d H:i:s";
		 if($user->expire==''){
 		 $datee = (new \DateTime())->modify('+31 days')->format($format);	
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
 
 		User::where('id',$userid)->update(array('expire' => $datee ));

		  return redirect('/home')->with('success', '  paiement effectué ');

            } else {
                // payment failed: display message to customer
                return $response->getMessage();
            }
        }
		
	}
}
