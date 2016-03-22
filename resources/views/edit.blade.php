@extends('layouts/master')

@section('content')
    
    
    {{Form::open(array('url' => 'contacts/'.$contact->id, 'method' => 'PUT')) }}
    <table class="cntactstable">
      <tr>
        <td> {{ Form::label('first_name','First Name:') }}</td> 
        <td> {{ Form::text('first_name',$contact->first_name) }}</td>
      </tr>
      <tr>
        <td> {{ Form::label('last_name','Last Name:') }}</td> 
        <td> {{ Form::text('last_name',$contact->last_name) }}</td>
      </tr>
      
      <tr>
        <td id="tabledes">Email:</td><td> </td>
      </tr>
      <?php $iter=0; ?>
      @foreach($emails as $email)
        <tr>
          <td><?php $iter++; echo $iter;?>. {{ Form::label('email','Email:')}}</td> 
          <td>{{ Form::text('email'.$iter,$email->email_adr) }}</td>
          {{ Form::hidden('email_id'.$iter, $email->id) }}
        </tr>
      @endforeach
      {{ Form::hidden('num_email', $iter) }}
      <tr>
        <td>{{ Form::label('email','add new email:')}}</td>
        <td>{{ Form::text('email_new','') }}</td>
      </tr>
      
      <tr>
        <td id="tabledes">Telephone:</td><td> </td>
      </tr>
      <?php $iter=0; ?>
      @foreach($telephones as $tel)
        <tr>
          <td><?php $iter++; echo $iter;?>. {{ Form::text('type'.$iter,$tel->type) }} </td> 
          <td>{{ Form::text('number'.$iter,$tel->number) }}</td>
          {{ Form::hidden('tel_id'.$iter, $tel->id) }}
        </tr>
      @endforeach
      {{ Form::hidden('num_tel', $iter) }}
      <tr>
        <td><?php $iter++; echo $iter;?>. {{ Form::text('type_new','new phone number') }} </td> 
          <td>{{ Form::text('number_new','') }}</td>
      </tr>
      
      <tr>
        <td id="tabledes"> {{ Form::label('street','Street:') }}</td> 
        <td> {{ Form::text('street',$contact->street) }}</td>
      </tr>
      <tr>
        <td> {{ Form::label('pcode','Postal Code:') }}</td> 
        <td> {{ Form::text('pcode',$contact->pcode) }}</td>
      </tr>
      <tr>
        <td> {{ Form::label('city','City:') }}</td> 
        <td> {{ Form::text('city',$contact->city) }}</td>
      </tr>
      <tr>
        <td> {{ Form::label('country','Country:') }}</td> 
        <td> {{ Form::text('country',$contact->country) }}</td>
      </tr>
      
      <tr>
        <td>Notes:</td><td> </td>
      </tr>
      <?php $iter=0; ?>
      @foreach($notes as $note)
        <tr>
          <td><?php $iter++; echo $iter;?>. {{ Form::label('note','Notes:')}} </td> 
          <td>{{ Form::text('note_text'.$iter,$note->note_text) }}</td>
          {{ Form::hidden('note_id'.$iter, $note->id) }}
        </tr>
      @endforeach
      {{ Form::hidden('num_note', $iter) }}
      <tr>
        <td>{{ Form::label('note_new','add new note:')}}</td>
        <td>{{ Form::text('note_new','') }}</td>
      </tr>
      
      </table>
      
    <table>
      <tr>
        <td>
            <a href=" {{URL::to('contacts') }}">Back </a>
        </td>
          <td>
            {{ Form::submit('Update Contact') }} 
        </td>
        
      </tr>
    </table>
    
    {{Form::close() }}
    
    
@stop