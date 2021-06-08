<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	  $type=Auth::user()->type;
	  if($type=='admin'){
       $users = User::get();

      return view('users.index',  compact('users') ); 
	  }
     }
    public function verify()
    {
		
      return view('auth.verify'  ); 
		
	}
	
	 
	     public static function  ChampById($champ,$id)
    {
        $user = User::find($id);
        if (isset($user[$champ])) {
            return $user[$champ] ;
        }else{return '';}

    }
	
	
	    public function updating(Request $request)
    {
		
        $id= $request->get('user');
        $champ= strval($request->get('champ'));
        if($champ=='password'){
            $val= bcrypt(trim($request->get('val')));

        }else{
            $val= $request->get('val');

        }
          User::where('id', $id)->update(array($champ => $val));

    }
	
	
    public function view($id)
    {
	  $type=Auth::user()->type;
	  if($type=='admin'){		
        $user = User::find($id);
      return view('users.view',  compact('user') ); 
	
		}
	}
	
	
    public  function bloquer($id)
    {
  	  $type=Auth::user()->type;
	  if($type=='admin'){
      		User::where('id', $id)->update(array(
  		'statut' => 2,
		));
	        return redirect('/users')->with('success', '  bloqué ');

		}	
	}	
	
    public  function debloquer($id)
    {
  	  $type=Auth::user()->type;
	  if($type=='admin'){
      		User::where('id', $id)->update(array(
  		'statut' => 0,
		));
	        return redirect('/users')->with('success', '  debloqué ');

			}	
	}	
	
    public  function destroy($id)
    {
	  $type=Auth::user()->type;
	  if($type=='admin'){		
		// suppresion des mesages
	 	DB::table('messages')->where('from_id',$id)->delete();

        $user = User::find($id);
         $user->delete();	
	        return redirect('/users')->with('success', '  Supprimé ');

			}
	}
	
		public function profile(  )
	{
        $user = auth()->user();

        $user= User::where('id',$user->id)->first();
        return view('users.profile',['id'=>$user->id,'user'=>$user]);
 	}
	 
   /* public function deletemsg(Request $request)
    {    
	$id= $request->get('id'); 				
	 DB::table('messages')->where('id', $id)->delete();
	}
	*/
    public  function deletemsg($id)
    {
		// suppresion des mesages
	 	DB::table('messages')->where('id',$id)->delete();
	   return redirect('/chat')->with('success', '  Supprimé ');

	}
		
    public function updateuser(Request $request)
    {
        $id= $request->get('user');
     //   $name= $request->get('name');
        $age= $request->get('age');
        $sexe= $request->get('sexe');
        $tel= $request->get('tel');
        $bio= $request->get('bio');
        $password= $request->get('password');
        $confirmation= $request->get('confirmation');
         if($password !=''  && (strlen($password )>5) ){
		
		if($password == $confirmation )
		{  $password= bcrypt(trim($request->get('password')));

					
		User::where('id', $id)->update(array(
 		//'name' => $name,
 		'sexe' => $sexe,
		'age' => $age,
		'bio' => $bio,
		'tel' => $tel,
		'password' => $password,
		
		));
		 }
        }else{

		 User::where('id', $id)->update(array(
 		//'name' => $name,
 		'sexe' => $sexe,
		'age' => $age,
		'bio' => $bio,
		'tel' => $tel,
 		
		));
		
        }
		
	  return redirect('/profile')->with('success', ' modifié avec succès');

 
    }	
	
	
}
