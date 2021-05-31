
@extends('layouts.app') 
 
 
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

@section('content')
    <style>
      
    </style>
  <div class="container">
  
          
    <form method="post" action="{{ route('salons.store') }}"  enctype="multipart/form-data">
			  {{ csrf_field() }}
   				
		 
 
          
       <div class="form-group">
			<div class="row">
			  <div class="col-lg-6">
                <label for="image">Image :</label>
                    <input id="image" type="file" class="form-control" name="image"  accept="image/*"/>
 			 </div>
			 <div class="col-lg-6">
                   
             </div>
          </div>
        </div> 
		
           <div class="form-group">
			<div class="row">
			  <div class="col-lg-6">
                <label for="name">Nom :</label>
                <input id="name"   type="text" class="form-control" name="name"  value="" />
 			 </div>
			 <div class="col-lg-6">
                   
             </div>
          </div>
        </div> 
		
	     <div class="form-group">
			<div class="row">
			<div class="col-lg-6">	
			<label for="description">Description:</label>
				<textarea class="form-control" name="description" id="description"></textarea>
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
				<option value="public"   >Public</option>
				<option value="vip"  >VIP</option>
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

 
