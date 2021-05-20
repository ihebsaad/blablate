{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="m-li-divider @if('user_'.Auth::user()->id == $id && $id != "0") m-list-active @endif" style="width:100%">
        <tr data-action="1" class="salon-list-item salons" style="width:100%">
            {{-- Avatar side --}}
            <td>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="fa  fa-home" style="font-size: 22px; color: #68a5ff; margin-top: calc(50% - 10px);"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="salon_1">Salon Principale (<?php echo \App\User::where('salon',1)->where('active_status',1)->count(); ?>)</p> 
             <!--   <span>messages enregistrés</span>-->
            </td>
        </tr>
        <tr data-action="2"  class="salon-list-item salons" style="width:100%">
            {{-- Avatar side --}}
            <td>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="fa  fa-users" style="font-size: 22px; color: #68a5ff; margin-top: calc(50% - 10px);"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="salon_2">Salon Lions(<?php echo \App\User::where('salon',2)->where('active_status',1)->count(); ?>)</p>
             <!--   <span>messages enregistrés</span>-->
            </td>
        </tr>
        <tr data-action="3" class="salon-list-item salons" style="width:100%">
            {{-- Avatar side --}}
            <td>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="far fa-bookmark" style="font-size: 22px; color: #68a5ff; margin-top: calc(50% - 10px);"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="salon_3">Princesses (<?php echo \App\User::where('salon',3)->where('active_status',1)->count(); ?>)</p>
               <!-- <span>messages enregistrés</span>-->
            </td>
        </tr>		
    </table>
@endif
<input id="iduser" type="hidden" value="<?php echo Auth::user()->id ;?>">
<script>

    $('.salons').click(function(){
     var  messeng  = $(this).find('p[data-id]').attr('data-id');
	 var salon= messeng.split('_')[1];
    
        var user = $('#iduser').val();
         //if ( (val != '')) {
        var _token = $('meta[name="csrf-token"]').attr('content');
      //  var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('users.updating') }}",
            method: "POST",
            data: {user: user , champ:'salon' ,val:salon, _token: _token},
            success: function (data) {
    // alert(user);
     //alert(salon);
		 
             }
        });
        // } else {

        // }
   });

</script>