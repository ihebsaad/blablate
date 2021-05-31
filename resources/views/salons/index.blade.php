 @extends('layouts.app')

 
  <style>.searchfield{width:100px;}
		 #mytable{width:100%!important;margin-top:10px !important;}
 </style> 
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
 @section('content')
 
<div class="container">
                <div class="row">
                <div class="col-lg-9"><h2>Liste des Salons</h2></div>
                <div class="col-lg-3">
                    <a   class="btn btn-md btn-success"    href="{{action('SalonsController@create')}}" ><b><i class="fas fa-plus"></i> Ajouter un salon</b></a>
                </div>
            </div>
			
    <table class="table table-striped" id="mytable" style="width:100%">
        <thead>
        <tr id="headtable">
            <th>ID</th>
            <th>Image</th>
             <th>Nom</th>
            <th>Description</th>
            <th>Type</th> 
            <th>Création</th> 
            <th>Actions</th>
        </tr>
            
            </thead>
            <tbody>
            @foreach($salons as $salon)

                <tr> 
                    <td>{{$salon->id }}</td>
                      <td><a href="{{action('SalonsController@view', $salon['id'])}}" >	
					  <?php if($salon['avatar'] !=''){?><img class="pull-right" src="<?php echo asset('storage/app/users-avatar/'.$salon['avatar'])?>" style="max-width:80px"/><?php } else{?>
				<img class="pull-right" src="storage/app/users-avatar/room.png" style="max-width:80px"/>
				<?php }?>
				 </a></td>
                      <td><a href="{{action('SalonsController@view', $salon['id'])}}" >{{$salon->name }}</a></td>
				 
                     <td> {{$salon->description }} </td>
                     <td>{{$salon->type}} </td>
                      <td><?php echo date('d/m/Y H:i', strtotime($salon->created_at)) ;?> </td>
					 
                   <td>  
                        <a   href="{{action('SalonsController@view', $salon['id'])}}"  class="btn btn-md btn-success"  role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Valider" >
                            <span class="far fa-eye" ></span> Voir
                        </a>                  
 			<?php	if($salon->type !='public'){ ?>	<a  onclick="return confirm('Êtes-vous sûrs ?')"  href="{{action('SalonsController@destroy', $salon['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                            <span class="fa fa-fw fa-trash-alt"></span> Supprimer
                        </a>  <?php } ?>               
                  </td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>		
 @endsection



 
<!-- Datatables -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
 
	 
 <script type="text/javascript">
    $(document).ready(function() {
 
 
            var table = $('#mytable').DataTable({
                orderCellsTop: true,
              //  dom : '<"top"flp<"clear">>rt<"bottom"ip<"clear">>',
                responsive:true,
				 aaSorting : [],               
              
                "columnDefs": [ {
                    "targets": 'no-sort',
                    "orderable": false,
                } ]
               

            });
 });
	 
</script>

  