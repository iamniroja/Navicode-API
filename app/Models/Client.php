<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
   // use HasFactory;


    // Specifies the table associated with this model 
    protected $table ='clients';

    // Specifies the primary ke
    protected $primaryKey ='id';
       // Specifies which fields are mass-assignable
    protected $fillable =[
             'name',
            'phonenumber',
             'date',
             
           
             'status'

    ];
  
}
