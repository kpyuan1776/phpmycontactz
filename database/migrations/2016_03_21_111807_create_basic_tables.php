<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicTables.php extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("
          CREATE TABLE contacts (
              id INT NOT NULL AUTO_INCREMENT,
              first_name VARCHAR(255) NOT NULL,
              last_name VARCHAR(255) NOT NULL,
              street VARCHAR(255),
              pcode VARCHAR(255),
              city VARCHAR(255),
              country VARCHAR(255),
              created_at TIMESTAMP DEFAULT 0 ,
              updated_at TIMESTAMP DEFAULT 0 ,
              PRIMARY KEY (id))");
              
      DB::statement("
          CREATE TABLE telephones (
              id INT NOT NULL AUTO_INCREMENT,
              type VARCHAR(255) NOT NULL,
              number VARCHAR(255) NOT NULL,
              contact_id INT NOT NULL ,
              created_at TIMESTAMP DEFAULT 0 ,
              updated_at TIMESTAMP DEFAULT 0 ,
              PRIMARY KEY (id),
              FOREIGN KEY (contact_id) REFERENCES contacts(id))");
              
      DB::statement("
          CREATE TABLE emails (
              id INT NOT NULL AUTO_INCREMENT,
              email_adr VARCHAR(255) NOT NULL,
              contact_id INT NOT NULL ,
              created_at TIMESTAMP DEFAULT 0 ,
              updated_at TIMESTAMP DEFAULT 0 ,
              PRIMARY KEY (id),
              FOREIGN KEY (contact_id) REFERENCES contacts(id))");
              
      DB::statement("
          CREATE TABLE notes (
              id INT NOT NULL AUTO_INCREMENT,
              note_text TEXT NOT NULL,
              contact_id INT NOT NULL ,
              created_at TIMESTAMP DEFAULT 0 ,
              updated_at TIMESTAMP DEFAULT 0 ,
              PRIMARY KEY (id),
              FOREIGN KEY (contact_id) REFERENCES contacts(id))");

          
        /*Schema::create('notes',function($table){
          $table->increments('id');
          $table->text('note_text');
          $table->integer('contact_id')->unsigned();
          $table->timestamps();
          $table->foreign('contact_id')->references('id')->on('contacts');*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::statement("DROP TABLE contacts");
        Schema::drop('contacts');
        Schema::drop('telephones');
        Schema::drop('emails');
        Schema::drop('notes');
    }
}
