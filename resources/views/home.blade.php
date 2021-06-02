@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tableau de bord</div>

                <div class="card-body">--->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

  					
					
<link  href="{{ asset('/public/css/sb-admin-2.min.css') }}"    rel="stylesheet">
			
	<script src="{{ asset('/public/js/chatify/font.awesome.min.js') }}"></script>
				

<?php
$type='';
if (Auth::check()) {

$user = auth()->user();
 $iduser=$user->id;
$type=$user->type;
} 

?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"  style="margin-bottom:25px" >
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Chat</div>
                      <div class=" "><a href="{{ route('chat') }}">Chat</a> </div>
 
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comment fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
 
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:25px" >
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px"  class="text-xs font-weight-bold text-success text-uppercase mb-1">Compte</div>
                   <?php if($type=='admin'){ ?>   <div class="  "><a  href="{{route('users')}}">Utilisateurs</a> </div><?php } ?>
                      <div class="  "><a  href="{{route('profile')}}">Mon Profil</a> </div>
                                         </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  <?php if($type=='admin'){ ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:25px" >
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px"  class="text-xs font-weight-bold text-info text-uppercase mb-1">Abonnements</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                      <div class="  "><a  href="#">Abonnements </a> </div>
                       </div>
                  
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
  <?php } 
  
  if($type=='admin'){ ?>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-6"   style="margin-bottom:25px" >
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div style="font-size:22px;margin-bottom:25px"  class="text-xs font-weight-bold text-warning text-uppercase mb-1">Paramètres</div>
				        <div class="  "><a  href="{{route('salons')}}">Salons </a> </div>
                     </div>
                    <div class="col-auto">
                      <i class="fas  fa-cogs fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
  <?php } ?>							
					
					
					
					
                </div>
            </div>
  <!--      </div>
    </div>
</div>-->
@endsection
