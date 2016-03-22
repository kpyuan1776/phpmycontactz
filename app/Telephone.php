<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    //to prevent MassAssignementException when updated at once
    protected $fillable = array('type','number','contact_id');
    
    public function contact() {
      return $this->belongsTo('\App\Contact');
    }
}
