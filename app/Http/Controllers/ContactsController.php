<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
    /**
     *  Display a listing of the resource.
     * GET http://www.kpaulyuan/mycontactz/public/contacts
     * 
     * @return Response
     */
     public function index()
     {
       //load contacts from database
       $contacts = \App\Contact::all();
       
       //return index, send contacts
       return view('index')->withContacts($contacts);
     }
     
     /**
      * Show the form for creating a new resource.
      * GET http://www.kpaulyuan/mycontactz/public/contacts/create
      * 
      * @return Response
      */
      public function create()
      {
        //dispatches user to create.blade.php
        return view('create');
      }
      
      /**
       * Create a newly created resource in storage.
       * POST http://www.kpaulyuan/mycontactz/public/contacts
       * 
       * @return Response
       */
       public function store(Request $request)
       {
         

         // persist contacts
         $contact = new \App\Contact;
         $contact->first_name = $request->input('first_name');
         $contact->last_name = $request->input('last_name');
         $contact->street = $request->input('street');
         $contact->pcode = $request->input('pcode');
         $contact->city = $request->input('city');
         $contact->country = $request->input('country');
         $contact->save();
         
         //$c_id->maxID contains the latest integer
         $c_id= \App\Contact::getMaxId();
         //dd($c_id);
         
         // persist email addresses
         $email = new \App\Email;
         $email->email_adr = $request->input('email');
         $email->contact_id = $c_id->maxID;
         $email->save();
         
         //persist telephone numbers
         $tel = new \App\Telephone;
         $tel->type = $request->input('type');
         $tel->number = $request->input('number');
         $tel->contact_id = $c_id->maxID;
         $tel->save();
         
         //persist notes
         $note = new \App\Note;
         $note->note_text = $request->input('note_text');
         $note->contact_id = $c_id->maxID;
         $note->save();
         
         return \Redirect::to('contacts');
       }
       
       /**
        * Display the specified resource.
        * GET http://www.kpaulyuan/mycontactz/public/contacts/{resourcename}/show
        * 
        * @param int $id
        * @return Response
        */
        public function show($id)
        {
          //get the corresponding contact
          $contact = \App\Contact::find($id);
          $emails = \App\Contact::find($id)->emails;
          $telephones = \App\Contact::find($id)->telephones;
          $notes = \App\Contact::find($id)->notes;
          return view('show')->withContact($contact)->withEmails($emails)
                          ->withTelephones($telephones)->withNotes($notes)
                          ->with('q_dele','');
          
        }
        
        /**
        * Display the specified resource and asks user to delete.
        * GET http://www.kpaulyuan/mycontactz/public/contacts/del/{resourcename}
        * 
        * @param int $id
        * @return Response
        */
        public function showDel($id)
        {
          //get the corresponding contact
          $contact = \App\Contact::find($id);
          $emails = \App\Contact::find($id)->emails;
          $telephones = \App\Contact::find($id)->telephones;
          $notes = \App\Contact::find($id)->notes;
          return view('show')->withContact($contact)->withEmails($emails)
                          ->withTelephones($telephones)->withNotes($notes)
                          ->with('q_dele','Do you really want to delete this contact?');
          
        }
        
        /**
        * Show the form for editing the specified resource.
        * GET http://www.kpaulyuan/mycontactz/public/contacts/{resourcename}/edit
        * 
        * @param int $id
        * @return Response
        */
        public function edit($id)
        {
          //get the corresponding contact
          $contact = \App\Contact::find($id);
          $emails = \App\Contact::find($id)->emails;
          $telephones = \App\Contact::find($id)->telephones;
          $notes = \App\Contact::find($id)->notes;
          
          //first_name is then accessed via $contactall['contact']->first_name
          /*$contactall = array("contact"=>$contact, "emails" => $emails,
                  "telephones" => $telephones, "notes" => $notes);
            return view('edit')->with('contactall',$contactall);*/
          
          return view('edit')->withContact($contact)->withEmails($emails)
                              ->withTelephones($telephones)->withNotes($notes);
        }
        
        /**
        * Update the specified resource from storage.
        * PUT http://www.kpaulyuan/mycontactz/public/contacts/{resourcename}/update
        * 
        * @param int $id
        * @return Response
        */
        public function update(Request $request,$id)
        {
          $contact = \App\Contact::find($id);
          $contact->first_name = $request->input('first_name');
          $contact->last_name = $request->input('last_name');
          $contact->street = $request->input('street');
          $contact->pcode = $request->input('pcode');
          $contact->city = $request->input('city');
          $contact->country = $request->input('country');
          $contact->save();
          
          //loop over number of telephone edits
          for($i=1; $i <= $request->input('num_tel');$i++){
            $tel = \App\Telephone::find($request->input('tel_id'.$i));
            $tel->type = $request->input('type'.$i);
            $tel->number = $request->input('number'.$i);
            $tel->save();
          }
          //loop over number of email edits
          for($i=1; $i <= $request->input('num_email');$i++){
            $email = \App\Email::find($request->input('email_id'.$i));
            $email->email_adr = $request->input('email'.$i);
            $email->save();
          }
          //loop over number of note edits
          for($i=1; $i <= $request->input('num_note');$i++){
            $note = \App\Note::find($request->input('note_id'.$i));
            $note->note_text = $request->input('note_text'.$i);
            $note->save();
          }
          
          if($request->input('email_new')){
            // persist email addresses
            $email = new \App\Email;
            $email->email_adr = $request->input('email_new');
            $email->contact_id = $id;
            $email->save();
          }
          
          if($request->input('number_new')){
            // persist email addresses
            $tel = new \App\Telephone;
            $tel->type = $request->input('type_new');
            $tel->number = $request->input('number_new');
            $tel->contact_id = $id;
            $tel->save();
          }
          
          if($request->input('note_new')){
            // persist email addresses
            $email = new \App\Note;
            $email->note_text = $request->input('note_new');
            $email->contact_id = $id;
            $email->save();
          }
          
          return \Redirect::to('contacts');
          
        }
        
        /**
        * Remove the specified resource from storage.
        * DELETE http://www.kpaulyuan/mycontactz/public/contacts/{resourcename}
        * 
        * @param int $id
        * @return Response
        */
        public function destroy($id)
        {
          $contact = \App\Contact::find($id);
          
          $emails = \App\Contact::find($id)->emails;
          foreach ($emails as $email){
            $email->delete();
          }
          $telephones = \App\Contact::find($id)->telephones;
          foreach ($telephones as $telephone){
            $telephone->delete();
          }
          $notes = \App\Contact::find($id)->notes;
          foreach ($notes as $note){
            $note->delete();
          }
          
          $contact->delete();
          return \Redirect::to('contacts');
        }
        
        /**
        * Remove the specified resource from storage.
        * DELETE http://www.kpaulyuan/mycontactz/public/contacts/destroyEmail/{resourcename}
        * 
        * @param int $id
        * @return Response
        */
        public function deleteEmail($id)
        {
          $email = \App\Email::find($id);
          
          $email->delete();
          return \Redirect::to('contacts');
        }
        
        /**
        * Remove the specified resource from storage.
        * DELETE http://www.kpaulyuan/mycontactz/public/contacts/destroyTel/{resourcename}
        * 
        * @param int $id
        * @return Response
        */
        public function deleteTel($id)
        {
          $tel = \App\Telephone::find($id);
          
          $tel->delete();
          return \Redirect::to('contacts');
        }
        
        /**
        * Remove the specified resource from storage.
        * DELETE http://www.kpaulyuan/mycontactz/public/contacts/destroyNote/{resourcename}
        * 
        * @param int $id
        * @return Response
        */
        public function deleteNote($id)
        {
          $note = \App\Note::find($id);
          
          $note->delete();
          return \Redirect::to('contacts');
        }
        
}
