<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

       $users = User::get();

      return view('users.index',  compact('users') ); 
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
        $user = User::find($id);
      return view('users.view',  compact('user') ); 
	
	}
	
    public function destroy($id)
    {
        $user = User::find($id);
         $user->delete();	
	
	}
	
		public function profile(  )
	{
        $user = auth()->user();

        $user= User::where('id',$user->id)->first();
        return view('users.profile',['id'=>$user->id,'user'=>$user]);
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
