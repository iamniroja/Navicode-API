<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     // Specifies the table associated with this model 
     protected $table ='members';

     // Specifies the primary ke
     protected $primaryKey ='id';
        // Specifies which fields are mass-assignable
     protected $fillable =[
              'name',
              'role',
              'image',
              'Status'      ];
 
              public function getImageUrlAttribute()
    {
        return $this->image ? url('storage/' . $this->image) : null;
    }
   
}
