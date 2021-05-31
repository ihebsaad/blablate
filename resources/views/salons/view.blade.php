
@extends('layouts.app') 
 
@section('content')
 
<div class="container">

     <form method="post" action="{{ route('salons.edit') }}"  enctype="multipart/form-data">
	 {{ csrf_field() }}
     <input type="hidden" id="iduser" value="{{$salon->id}}" name="id" />
        
 		<!--<img style="width:100px;float:right;margin-right:50px" src="{{ asset('storage/app/'.config('chatify.user_avatar.folder').'/'.$salon->avatar) }}"    />-->
		
			  <div class="row">
                <div class="form-group col-md-6">
                    <label for="titre">Image:</label>
                    <input id="image" type="file" class="form-control" name="image"  accept="image/*"/>
                </div>
				 <div class="  col-md-6">

				<?php if($salon['avatar'] !=''){?><img class="pull-right" src="../../storage/app/users-avatar/<?php echo $salon['avatar'];?>" style="max-width:150px"/><?php } else{?>
				<img class="pull-right" src="../../storage/app/users-avatar/room.png" style="max-width:150px"/>
				<?php }?>
                </div>
				
                </div>

		<div class="clearfix"></div>
          <div class="form-group">
			<div class="row">
			  <div class="col-lg-6">
                <label for="name">Nom :</label>
                <input id="name"   type="text" class="form-control" name="name"  value="{{ $salon->name }}" />
 			 </div>
			 <div class="col-lg-6">
                   
             </div>
          </div>
        </div> 
		
	     <div class="form-group">
			<div class="row">
			<div class="col-lg-6">	
  <label for="description">Description:</label>
				<textarea class="form-control" name="description" id="description">{{ $salon->description }}</textarea>
			 </div>
			 <div class="col-lg-6">
           	 </div>
          	 </div>
          	 </div>  
				 
           <div class="form-group">
			<div class="row">
			<div class="col-lg-6">
			    <label for="eleve">Type:</label>
				<select id="type" name="type"  class="form-control">
				<option value="public" <?php if  ($salon->type=='public'){echo'selected="selected"';} ?> >Public</option>
				<option value="vip" <?php if  ($salon->type=='vip'){echo'selected="selected"';} ?> >VIP</option>
				</select>
          	 </div>
			 <div class="col-lg-6">
           	 </div>
          	 </div>
          	 </div>
			 
		   <div class="form-group">
			<div class="row">
			<div class="col-lg-6">
				<button  type="submit"  class="btn btn-primary">Enregistrer</button>
			</div>
			<div class="col-lg-6">
			</div>
			</div>
			</div>
			 
 </form>
</div>		

@endsection			 