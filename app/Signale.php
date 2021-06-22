<?php

namespace App;

 use Illuminate\Foundation\Auth\User as Authenticatable;

class Signale extends Authenticatable
{
   
    protected $fillable = [
   'user',  'par'     ];
 
}
