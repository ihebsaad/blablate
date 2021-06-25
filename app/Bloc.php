<?php

namespace App;

 use Illuminate\Foundation\Auth\User as Authenticatable;

class Bloc extends Authenticatable
{
   
    protected $fillable = [
   'user',  'par'     ];
 
}
