<?php 
//use DB;
use App\Http\Controllers\SalonsController;

$user = auth()->user();
 $iduser=$user->id;
$type=$user->type;

 $statut=Auth::user()->statut;
$expire=Auth::user()->expire;
$now=date('Y-m-d- H:i');
if($expire > $now ){
	$abonne=true;
}else{
	$abonne=false;
}

if( $abonne|| $type=='admin'){
	 $salons=DB::table('salons')->orderBy('type')->get();
}else{
 $salons=DB::table('salons')->where('type','public')->get();	
}
 
  
 


 if($abonne){ ?>
   <center><span style="margin:10px 10px 10px 10px" class="btn btn-success salons-btn" ><i class="fa-lg fas fa-person-booth"></i>  créer un salon  </span></center>

 <?php } 
 
  
 ?>
  
{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="salon-list m-li-divider @if('user_'.Auth::user()->id == $id && $id != "0") m-list-active @endif" style="width:100%">

<?php foreach($salons as $salon){
	$type=$salon->type;
	if($type=='public'){$bg='#d9efff';$color='#68a5ff';}else{
		$bg='#bcdf94';$color='#18aa76';
	}
?>


        <tr data-action="<?php echo $salon->id;?>" class="salon-list-item salons  <?php if(isset($salonid)){ if ($salonid==$salon->id){ echo 'm-list-active';  } }?>" style="width:100%">
            {{-- Avatar side --}}
            <td style="padding:5px !important;">
            <div class="avatar av-m" style="background-color: <?php echo $bg;?>; text-align: center;">
                <span class="fa  fa-users" style="font-size: 15px; color:<?php echo $color;?> ; margin-top: calc(50% - 10px);"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p    data-id="salon_<?php echo $salon->id;?>"><?php echo $salon->name;?> (<?php echo \App\User::where('salon',$salon->id)->where('active_status',1)->count(); ?>)</p> 
             <!--   <span>messages enregistrés</span>-->
            </td>
        </tr>


	
<?php	
}

?>


	
	
    </table>
@endif
<input id="iduser" type="hidden" value="<?php echo Auth::user()->id ;?>">
 