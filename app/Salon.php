<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Salon extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar','type','description'  
    ];

 //ALTER TABLE `salons` CHANGE `nom` `name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
//ALTER TABLE `salons` ADD `avatar` VARCHAR(255) NULL AFTER `type`;
//ALTER TABLE `salons` CHANGE `avatar` `avatar` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'room.png';

 
 
}
