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
            <th>Inscription</th>
            <th>Actions</th>
        </tr>
            
            </thead>
            <tbody>
            @foreach($users as $user)

                <tr> 
                    <td> <img style="width:60px;" src="{{ asset('storage/app/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}"    /></td>
                      <td><a href="{{action('UsersController@view', $user['id'])}}" >{{$user->username }}</a></td>
                   <!--  <td><a href="{{action('UsersController@view', $user['id'])}}" >{{$user->name }}</a></td>-->
                     <td>{{$user->sexe}} </td>
                     <td>{{$user->age}} </td>
                     <td><?php echo date('d/m/Y H:i', strtotime($user->created_at)) ;?> </td>
					 
                   <td> 
                

                        <a   href="{{action('UsersController@view', $user['id'])}}"  class="btn btn-md btn-success"  role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Valider" >
                            <span class="far fa-eye" ></span> Voir
                        </a>                  
 					<a  onclick="return confirm('Êtes-vous sûrs ?')"  href="{{action('UsersController@destroy', $user['id'])}}" class="btn btn-danger btn-sm btn-responsive " role="button" data-toggle="tooltip" data-tooltip="tooltip" data-placement="bottom" data-original-title="Supprimer" >
                            <span class="fa fa-fw fa-trash-alt"></span> Supprimer
                        </a>                 
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

  