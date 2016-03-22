<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //to prevent MassAssignementException when updated at once
    protected $fillable = array('note_text','contact_id');
    
    public function contact() {
      return $this->belongsTo('\App\Contact');
    }
}
