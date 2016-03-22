# phpmycontactz


CRUD Example of a contacts manager, in Laravel 5
==================================================

A basic web-based CRUD example that allows a single user to manage contacts such as email addresses, telephone numbers etc...


## Overview

* Item 1 There is a single who can view all his contacts, add a new contact, edit or delete a specific contact. Moreover, email, phone and notes can be added/edited/deleted separately.
* Item 2 Application is written in PHP/Laravel 5
* Item 3 Data can be persisted in a MySQL-database (see database dumps for further details)
* Item 4 there are 4 tables: contacts, emails, telephones, notes. 
* Item 5 for persistance operations Laravels-ORM Eloquet is used, there are four model classes: Contact.php,Email.php,Telephone.php and Note.php
* Item 6 the source code provided here requires a fully configured laravel 5 environment in order to run...



## Extensions:

1. friendly layout. The application would greatly benefit from a ReactJS-enhanced UI.
For example, data that originates from tables with key constraints: emails,telephones,notes could be
dynamically extended when filling the form-fields of a previous element when creating a contact.
Moreover, showing a * all-contacts-component* and a *show-a-specific-contact* on the same view would improve the usability. 1

2. With an extension to several users that create contacts and  proper authentication, it would be much more useful. 2

3. ... 3

    
