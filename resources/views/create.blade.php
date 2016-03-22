@extends('layouts/master')

@section('content')

    <h1>Add New Contact</h1>
    
      
   
    {{Form::open(array('url' => 'contacts')) }}
     <table>
     <tr><td>
    {{ Form::label('first_name','First Name:') }}
      </td><td>
    {{ Form::text('first_name','first_name') }}
    </tr></td>
    <tr><td>
    {{ Form::label('last_name','Last Name:') }}
      </td><td>
    {{ Form::text('last_name','last_name') }}
    </tr></td>
    <tr><td>{{ Form::label('email','Email:')}}</td><td>
    <table>
      <tr>
        <td>
          
        </td>
        <td>
          {{ Form::text('email','email@mail.com') }}
        </td>
      </tr>
    </table>
    </td></tr>
    <tr><td>{{ Form::label('telephone','Tel:')}}</td><td>
    <table>
      <tr>
        <td>
          {{ Form::text('type','Mobile') }}
        </td>
        <td>
          {{ Form::text('number','888888') }}
        </td>
      </td></tr>
    </table>
    </tr>
    <tr><td>
    {{ Form::label('street','Street:') }}
      </td><td>
    {{ Form::text('street','street no. 1') }}
    </tr></td>
    <tr><td>
    {{ Form::label('pcode','Postal Code:') }}
      </td><td>
    {{ Form::text('pcode','80339') }}
    </tr></td>
    <tr><td>
    {{ Form::label('city','City:') }}
      </td><td>
    {{ Form::text('city','city') }}
    </tr></td>
    <tr><td>
    {{ Form::label('country','Country:') }}
      </td><td>
    {{ Form::text('country','Germany') }}
    </tr></td>
    <tr><td>{{ Form::label('note','Notes:')}}</td><td>
    <table>
      <tr>
        <td>
          
        </td>
        <td>
          {{ Form::text('note_text','Text') }}
        </td>
      </tr>
    </table>
    </td></tr>
    <tr><td>
      <a href=" {{URL::to('contacts') }}">Back </a>
      </td><td>
        
    {{ Form::submit('Add') }}
    {{Form::close() }}
    </td></tr>
    </table>
    
@stop