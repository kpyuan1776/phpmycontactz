@extends('layouts/master')

@section('content')
          
    <table id="cntactstable" >
      <thead>
        <tr>
          <td id="tabledes">first name</td>
          <td id="tabledes">last name</td>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr>
          <td>{{$contact->first_name }} </td>
          <td>{{$contact->last_name }} </td>
          <td>
            <a href=" {{URL::to('contacts/' . $contact->id) }}">View </a>
          </td>
          <td>
            <a href=" {{URL::to('contacts/' . $contact->id. '/edit') }}">Edit </a> 
          </td>
          <td>
            <a href=" {{URL::to('contacts/del/' . $contact->id) }}">Delete </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <a href=" {{URL::to('contacts/create') }}">Add New Contact </a>
    
@stop