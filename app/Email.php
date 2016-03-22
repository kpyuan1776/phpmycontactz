<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //to prevent MassAssignementException when updated at once
    protected $fillable = array('email_adr','contact_id');
    
    public function contact() {
      return $this->belongsTo('\App\Contact');
    }
}
