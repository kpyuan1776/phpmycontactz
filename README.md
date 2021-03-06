# phpmycontactz


CRUD Example of a contacts manager, in Laravel 5
==================================================

A basic web-based CRUD example that allows a single user to manage contacts such as email addresses, telephone numbers etc...


## Overview

*  There is a single who can view all his contacts, add a new contact, edit or delete a specific contact. Moreover, email, phone and notes can be added/edited/deleted separately.
* Application is written in PHP/Laravel 5
* Data can be persisted in a MySQL-database (see database dumps for further details)
* there are 4 tables: contacts, emails, telephones, notes. 
* for persistance operations Laravels-ORM Eloquet is used, there are four model classes: Contact.php,Email.php,Telephone.php and Note.php
* the source code provided here requires a fully configured laravel 5 environment in order to run. Just create a laravel project, e.g. using:

    php composer create-project laravel/laravel server-root/project-folder --prefer-dist

files can be also copy-pasted from here...

* a basic webform (webReactDynForm.php) using React JS is included. It contains the basic components to generate webforms. 
It allows to dynamically add an additional email input field when adding a new contact. 

## Database-Layout:

tables and fields:

* contacts
  * id: INT, PRIMARY, AUTO INCREMENT
  * first_name: Varchar(255), Not NULL
  * last_name: Varchar(255), Not NULL
  * street: Varchar(255)
  * pcode: Varchar(255)
  * city: Varchar(255)
  * country: Varchar(255)
  * created_at: Timestamp, Defalut 0,
  * updated_at: Timestamp, Defalut 0

* email
  * id: INT, PRIMARY, AUTO INCREMENT
  * email_adr: Varchar(255), Not Null
  * contact_id: INT, NOT NULL, FOREIGN KEY->contact(id)
  * created_at: Timestamp, Defalut 0,
  * updated_at: Timestamp, Defalut 0

* telephones
  * id: INT, PRIMARY, AUTO INCREMENT
  * type: Varchar(255)
  * number: : Varchar(255), Not Null
  * contact_id: INT, NOT NULL, FOREIGN KEY->contact(id)
  * created_at: Timestamp, Defalut 0,
  * updated_at: Timestamp, Defalut 0

* notes
  * id: INT, PRIMARY, AUTO INCREMENT
  * note_text: Text, Not Null
  * contact_id: INT, NOT NULL, FOREIGN KEY->contact(id)
  * created_at: Timestamp, Defalut 0,
  * updated_at: Timestamp, Defalut 0


## ReST Description

* GET /mycontacts/public/contacts
  * show all contacts
* GET /mycontacts/public/contacts/create
  * shows add new contact view
* GET /mycontacts/public/contacts/{contact_id}/show
  * shows contact information with id=contact_id
* POST /mycontacts/public/contacts
  * creates new contact in contacts,email,telephone,notes table
* GET /mycontact/public/contacts/{contact_id}/edit
  * shows contact information with id=contact_id for editing
* PUT /mycontacts/public/contacts/{contact_id}/update
  * updates contact information with id=contact_is
* DELETE /mycontacts//public/contacts/{contact_id}
  * deletes contact and all information related to from database
* Get /mycontacts/public/contacts/del/{contact_id}
  * shows contact with id=contact_id + warning message if deletion is intended 
* DELETE /mycontacts/public/contacts/destroyTel/{telephone_id}
  * deletes telephone entry with id=telephone_id
* DELETE /mycontacts/public/contacts/destroyNote/{note_id}
  * deletes note entry
* DELETE /mycontacts/public/contacts/destroyEmail/{email_id}
  * deletes emails entry

## Extensions:

1. more friendly layout. The application would benefit if the list of all contacts and the form for adding a new contact are next to
each other on the same view. Could be done with React JS components.
Moreover, showing a * all-contacts-component* and a *show-a-specific-contact* on the same view would improve the usability.

2. adding the feature: "dynamically generating new email input fields" from public/webReactDynForm.php to telephone and all create/update views

3. With an extension to several users that create contacts and  proper authentication, it would be much more useful.

4. JSON-format for View-Model interface

5. ...

    
