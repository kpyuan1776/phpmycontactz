@extends('layouts/master')

@section('content')

  <?php echo "<h1 style=\"color:red\">".$q_dele."</h1>";?>
  
    <table id="cntactstableshow">
      <tr>
        <td> First Name:</td> <td id="tabledes"> {{$contact->first_name}}</td>
      </tr>
      <tr>
        <td> Last Name:</td> <td id="tabledes"> {{$contact->last_name}}</td>
      </tr>
      
      <tr>
        <td id="tabledes">Email:</td><td> </td>
      </tr>
      <?php $iter=0; ?>
      @foreach($emails as $email)
        <tr>
          <td><?php $iter++; echo $iter;?>. </td> <td>{{$email->email_adr}}</td> 
          <td>
            {{Form::open(array('url' => 'contacts/deleteEmail/'.$email->id, 'method' => 'DELETE'))}}
            {{Form::submit('Delete Email')}}
            {{Form::close()}}
          </td>
        </tr>
      @endforeach
      
      <tr>
        <td id="tabledes">Telephone:</td><td> </td>
      </tr>
      <?php $iter=0; ?>
      @foreach($telephones as $tel)
        <tr>
          <td><?php $iter++; echo $iter;?>. {{$tel->type}} </td> <td>{{$tel->number}}</td>
          <td>
            {{Form::open(array('url' => 'contacts/deleteTel/'.$tel->id, 'method' => 'DELETE'))}}
            {{Form::submit('Delete Telephone')}}
            {{Form::close()}}
          </td>
        </tr>
      @endforeach
      
      <tr>
        <td id="tabledes"> Street:</td> <td> {{$contact->street}}</td>
      </tr>
      <tr>
        <td> Postal Code:</td> <td> {{$contact->pcode}}</td>
      </tr>
      <tr>
        <td> City:</td> <td> {{$contact->city}}</td>
      </tr>
      <tr>
        <td> Country:</td> <td> {{$contact->country}}</td>
      </tr>
      
      <tr>
        <td>Notes:</td><td> </td>
      </tr>
      <?php $iter=0; ?>
      @foreach($notes as $note)
        <tr>
          <td><?php $iter++; echo $iter;?>. </td> <td>{{$note->note_text}}</td>
        
        <td>
            {{Form::open(array('url' => 'contacts/deleteNote/'.$note->id, 'method' => 'DELETE'))}}
            {{Form::submit('Delete Note')}}
            {{Form::close()}}
          </td>
          </tr>
      @endforeach
      </table>
      
    <table>
      <tr>
        <td>
            <a href=" {{URL::to('contacts') }}">Back </a>
        </td>
          <td>
            <a href=" {{URL::to('contacts/' . $contact->id. '/edit') }}">Edit </a> 
        </td>
        
        <td>
            {{Form::open(array('url' => 'contacts/'.$contact->id, 'method' => 'DELETE'))}}
            {{Form::submit('Delete')}}
            {{Form::close()}}
        </td>
      </tr>
    </table>
    
@stop