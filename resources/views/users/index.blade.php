 @extends('layouts.app')

 
  <style>.searchfield{width:100px;}
		 #mytable{width:100%!important;margin-top:10px !important;}
 </style> 
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
 @section('content')
 
<div class="container">
    
    <table class="table table-striped" id="mytable" style="width:100%">
        <thead>
        <tr id="headtable">
            <th>Image</th>
             <th>Pseudo</th>
          <!--  <th>Nom</th>-->
            <th>Sexe</th>
            <th>Age</th>
            <th>Ville</th>
            <th>Inscription</th>
            <th>Type</th>
            <th>Abonnement</th>
            <th>Actions</th>
        </tr>
            
            </thead>
            <tbody>
            @foreach($users as $user)
				<?php $signals= \App\Signale::where('user',$user->id)->count(); ?>
                <tr> 
                    <td> <img style="width:60px;" src="{{ asset('storage/app/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}"    /></td>
                      <td><a href="{{action('UsersController@view', $user['id'])}}" >{{$user->username }} </a><br>(<?php echo $signals; ?>) signals</td>
                   <!--  <td><a href="{{action('UsersController@view', $user['id'])}}" >{{$user->name }}</a></td>-->
                     <td>{{$user->sexe}} </td>
                     <td>{{$user->age}} </td>
                     <td>{{$user->ville}} </td>
                     <td><?php echo date('d/m/Y H:i', strtotime($user->created_at)) ;?> </td>
                     <td><?php  $type= $user->type; if($type=='admin'){ echo 'Admin';}else{echo 'inscrit';} ?>  </td>
					 
                   <td><?php if($user->expire!=''){ echo 'expire le '. date('d/m/Y H:i', strtotime(  $user->expire)) ;}else{ echo '<span class="btn btn-danger">Non abonné</span>';}?></td> 
                   <td> 
                

                        <a   href="{{action('UsersController@view', $user['id'])}}"  class="btn btn-md btn-success"  role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Valider" >
                            <span class="far fa-eye" ></span> Voir
                        </a>                  
 			<?php if($type!= 'admin'){ ?>
			
				  <?php if($user->statut < 2 ){ ?>
				    <a  onclick="return confirm('Bloquer, Êtes-vous sûrs ?')"  href="{{action('UsersController@bloquer', $user['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Bloquer" >
                            <span class="fas fa-fw fa-user-slash"></span> Bloquer
                        </a>
					<?php }else{ ?> 

				    <a  onclick="return confirm('Débloquer, Êtes-vous sûrs ?')"  href="{{action('UsersController@debloquer', $user['id'])}}" class="btn btn-success btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Débloquer" >
                            <span class="fas fa-fw fa-user-check"></span> Débloquer
                        </a>
					<?php } ?> 					
					<a  onclick="return confirm('Supprimer, Êtes-vous sûrs ?')"  href="{{action('UsersController@destroy', $user['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                            <span class="fa fa-fw fa-trash-alt"></span> Supprimer
                        </a>
						
						
						
						<?php } ?>               
                  </td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>		
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


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
                 ,
                "language":
                    {
                        "decimal":        "",
                        "emptyTable":     "Pas de données",
                        "info":           "affichage de  _START_ à _END_ de _TOTAL_ entrées",
                        "infoEmpty":      "affichage 0 à 0 de 0 entrées",
                        "infoFiltered":   "(Filtrer de _MAX_ total d`entrées)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "affichage de _MENU_ entrées",
                        "loadingRecords": "chargement...",
                        "processing":     "chargement ...",
                        "search":         "Recherche:",
                        "zeroRecords":    "Pas de résultats",
                        "paginate": {
                            "first":      "Premier",
                            "last":       "Dernier",
                            "next":       "Suivant",
                            "previous":   "Précédent"
                        },
                        "aria": {
                            "sortAscending":  ": activer pour un tri ascendant",
                            "sortDescending": ": activer pour un tri descendant"
                        }
                    }              

            });
 });
	 
</script>

 @endsection



  