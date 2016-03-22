<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = array('first_name','last_name','street','pcode',
                      'city','country');
  
    public function emails() {
      return $this->hasMany('\App\Email');
    }
    
    public function telephones() {
      return $this->hasMany('\App\Telephone');
    }
    
    public function notes() {
      return $this->hasMany('\App\Note');
    }
    
    public static function getMaxId(){
      $maxIDarr = (\DB::select("SELECT MAX(id) as maxID FROM contacts"));
      //since id is AUTO_INCREMENTED there is only one max element
      return $maxIDarr[0];
    }
}
