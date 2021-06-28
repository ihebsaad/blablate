 @extends('layouts.app')

 
  <style>.searchfield{width:100px;}
		 #mytable{width:100%!important;margin-top:10px !important;}
 </style> 
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
 @section('content')
 <?php use App\Http\Controllers\UsersController;
 ?>
<div class="container">
    
    <table class="table table-striped" id="mytable" style="width:100%">
        <thead>
        <tr id="headtable">
            <th>Utilisateur</th>
             <th>Création</th>
            <th>Expiration</th>
            <th>Type</th>
         </tr>
            
            </thead>
            <tbody>
            @foreach($abonnements as $abonnement)
<?php $typeabn=''; $type = $abonnement->type; if($type==1){$typeabn='Premium';} if($type==2){$typeabn='Diamond';}?>
                <tr> 
                       <td><?php echo UsersController::ChampById('username',$abonnement->user);?>      </td>
                      <td><?php echo date('d/m/Y H:i', strtotime($abonnement->created_at)) ;?> </td>
                      <td><?php echo date('d/m/Y H:i', strtotime( $abonnement->expire)) ;?> </td>
                      <td><?php echo $typeabn ;?> </td>
 					 
                     
                        
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


 

  