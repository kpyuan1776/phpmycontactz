<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Eloquent::unguard();
        $this->call('ContactsTableSeeder');
    }
}

class ContactsTableSeeder extends Seeder {
  
  public function run() {
    DB::table('contacts')->insert(array(
        'first_name' => 'Tom',
        'last_name' => 'Miller',
        'street' => 'Tomstreet',
        'pcode' => '76545',
        'country' => 'Germany'
      ));
      
      DB::table('telephones')->insert(array(
        'type' => 'Mobile',
        'number' => '00498272738383',
        'contact_id' => 1
      ));
      
      DB::table('emails')->insert(array(
        'email_adr' => 'test@testmail.com',
        'contact_id' => 1
      ));
      
      DB::table('notes')->insert(array(
        'note_text' => 'Here I took some of my notes',
        'contact_id' => 1
      ));
  }
  
}
