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
	
	
	
	
	
	
}
