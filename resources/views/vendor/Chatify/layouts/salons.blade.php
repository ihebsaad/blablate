<?php 
//use DB;
use App\Http\Controllers\SalonsController;

  $salons=DB::table('salons')->get() ;?>
{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="m-li-divider @if('user_'.Auth::user()->id == $id && $id != "0") m-list-active @endif" style="width:100%">

<?php foreach($salons as $salon){
	$type=$salon->type;
	if($type=='public'){$bg='#d9efff';$color='#68a5ff';}else{
		$bg='#bcdf94';$color='#18aa76';
	}
?>


        <tr data-action="<?php echo $salon->id;?>" class="salon-list-item salons" style="width:100%">
            {{-- Avatar side --}}
            <td style="padding:5px !important;">
            <div class="avatar av-m" style="background-color: <?php echo $bg;?>; text-align: center;">
                <span class="fa  fa-users" style="font-size: 15px; color:<?php echo $color;?> ; margin-top: calc(50% - 10px);"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="salon_<?php echo $salon->id;?>"><?php echo $salon->name;?> (<?php echo \App\User::where('salon',$salon->id)->where('active_status',1)->count(); ?>)</p> 
             <!--   <span>messages enregistrés</span>-->
            </td>
        </tr>


	
<?php	
}

?>

     
    </table>
@endif
<input id="iduser" type="hidden" value="<?php echo Auth::user()->id ;?>">
<script>

</script>