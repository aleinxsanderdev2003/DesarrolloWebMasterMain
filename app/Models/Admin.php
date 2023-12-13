<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

   // Métodos requeridos para la interfaz Authenticatable
   public function getAuthIdentifierName()
   {
       return 'id';
   }

   public function getAuthIdentifier()
   {
       return $this->getKey();
   }

   public function getAuthPassword()
   {
       return $this->password;
   }

   public function getRememberToken()
   {
       return null; // Si no usas remember tokens
   }

   public function setRememberToken($value)
   {
       // Si no usas remember tokens
   }

   public function getRememberTokenName()
   {
       return null; // Si no usas remember tokens
   }
}
