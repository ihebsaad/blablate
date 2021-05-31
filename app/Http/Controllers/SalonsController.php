<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salon;
use App\User;

class SalonsController extends Controller
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
      $salons = Salon::get();
      return view('salons.index',  compact('salons') ); 
     }
	 
	 public function create()
    {
       return view('salons.create' ); 
     }
	 
	 public static function  ChampById($champ,$id)
    {
        $Salon = Salon::find($id);
        if (isset($Salon[$champ])) {
            return $Salon[$champ] ;
        }else{return '';}

    }
	
    public function store(Request $request)
    {
 
		 $name='';
		if($request->file('image')!=null)
		{$image=$request->file('image');
		 $name =  $image->getClientOriginalName();
                 $path = storage_path()."/app/users-avatar/";
 
          $image->move($path, $name);
		}
                 
				 
        $salon = new Salon([
             'avatar' =>  $name ,
             'name' =>trim( $request->get('name')),
             'description' => trim($request->get('description')),
             'type' => trim($request->get('type')) 
        ]);

        $salon->save();
        return redirect('/salons')->with('success', ' ajouté avec succès');

    }
	
	
	   public function edit(Request $request)
    {
        //
		 $id= $request->get('id');
		 $image= $request->file('image');
		 $name= $request->get('name');
		 $description= $request->get('description');
		 $type= $request->get('type');
 		 
        $salon  = Salon::find($id);
		
	$img='';
		if($request->file('image')!=null)
		{$image=$request->file('image');
		 $img =  $image->getClientOriginalName();
                 $path = storage_path()."/app/users-avatar/";
 
          $image->move($path, $img);	
		  Salon::where('id',$id)->update(
		array(
 		'name' => $name,
		'description' => $description,
		'type' => $type,
		'avatar' => $img
		));
		}else{
			Salon::where('id',$id)->update(
		array(
 		'name' => $name,
		'description' => $description,
		'type' => $type,
		)
		);	
			
		}
		
        return redirect('/salons/')->with('success', ' Modifié avec succès');
    }

	
	  public function updating(Request $request)
    {
        $id = $request->get('salon');
        $champ= strval($request->get('champ'));
 
            $val= $request->get('val');
 
          Salon::where('id', $id)->update(array($champ => $val));

    }
	
	
    public function view($id)
    {
        $salon = Salon::find($id);
      return view('salons.view',  compact('salon') ); 
	
	}
	
    public function destroy($id)
    {
        $Salon = Salon::find($id);
        $Salon->delete();	
	
	}
	
	
	    public function users(Request $request)
    {
	  $id = $request->get('salon');
	  $users = User::where('salon',$id)->where('active_status',1)->get();

	  $data='';
	  $data.='<ul class="list-users">';
	  foreach($users as $user){
		if($user->sexe=='masculin'){$color='#4167d5';}else{$color='#ec3aa5';}
		$data.='<li><span style="color:'.$color.'">'.$user->username.' ('.$user->age.')</span></li>';
 	  }
	  $data.='</ul>';
	  return $data;
	}
	
	
	
}
