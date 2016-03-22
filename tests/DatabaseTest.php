<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseTest extends Illuminate\Foundation\Testing\TestCase
{
/**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }

   /**
     * Basic Test for database table contacts.
     *  Assuming that database/DatabaseSeeder was executed:
     *
     * @return void
     */
    public function testDatabasetableContacts()
    { 
      $this->seeInDatabase('contacts', ['first_name' => 'Tom']);
    }
    
    /**
     * Basic Test for database table contacts.
     *  Assuming that database/DatabaseSeeder was executed:
     *
     * @return void
     */
    public function testDatabasetableEmails()
    { 
      $this->seeInDatabase('emails', ['email_adr' => 'test@testmail.com']);
    }
    public function testDatabasetableTelephones()
    { 
      $this->seeInDatabase('telephones', ['number' => '00498272738383']);
    }
    public function testDatabasetableNotes()
    { 
      $this->seeInDatabase('notes', ['note_text' => 'Here I took some of my notes']);
    }
    
    /**
     * A basic functional for Contact-Model calss.
     *  Assuming that database/DatabaseSeeder was executed:
     *
     * @return void
     */
    public function testModelContact()
    { 
      $contact = \App\Contact::find(1);
      $this->assertTrue($contact->first_name === 'Tom');
    }
    
    /**
     * A basic functional for Email-Model calss.
     *  Assuming that database/DatabaseSeeder was executed:
     *
     * @return void
     */
    public function testModelEmail()
    { 
      $email = \App\Email::find(1);
      $this->assertTrue($email->email_adr === 'test@testmail.com');
    }
    
    /**
     * A basic functional for Email-Model calss.
     *  Assuming that database/DatabaseSeeder was executed:
     *
     * @return void
     */
    public function testModelTelephone()
    { 
      $tel = \App\Telephone::find(1);
      $this->assertTrue($tel->number === '00498272738383');
    }
    
    /**
     * A basic functional for Email-Model calss.
     *  Assuming that database/DatabaseSeeder was executed:
     *
     * @return void
     */
    public function testModelNote()
    { 
      $note = \App\Note::find(1);
      $this->assertTrue($note->note_text === 'Here I took some of my notes');
    }
    
    /**
     * A basic functional for Email-Model calss.
     *  Assuming that database/DatabaseSeeder was executed:
     *
     * @return void
     */
    public function testModelContactNote()
    { 
      $notes = \App\Contact::find(1)->notes;
      $this->assertTrue($notes[0]->note_text === 'Here I took some of my notes');
    }
}
