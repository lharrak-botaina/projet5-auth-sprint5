<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    //this means we are allowing all the fields to be mass assigned
    protected $guarded=[];
     public function getRouteKeyName()
     {
       return 'uuid';
     }
}
