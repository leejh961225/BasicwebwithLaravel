@extends('layouts.app')


@section('content')
<h1> Messages </h1>
<p>Datatable was used to make interactive table filled with message data from mysql db.</p>
<br><br>
  @if(count($messages) > 0)
  <table class="table" id="Message_table">
      <thead>
            <th class="text-center">Message ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Message</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
  @foreach($messages as $message)
    
        <tr>
            <td>{{$message->id}}</td>
            <td><b>{{$message->name}}</b></td>
            <td>{{$message->email}}</td>
            <td>{{$message->message}}</td>
            <td><center><button class="btn btn-outline-info"   style="height:30px;width:80px" id="Edit_{{$message->id}}" data-info="{{$message->id}},{{$message->name}},{{$message->email}}" data-toggle="modal" data-target="#MessageModal">Edit</button> 
            
              <button type="button" class="btn btn-outline-danger"  style="height:30px;width:80px" id="Delete_{{$message->id}}" data-info="{{$message->id}},{{$message->name}},{{$message->email}}" data-toggle="modal" data-target="#MessageModal" >Delete</button></center>
            </td>
        </tr>
    
       
  
   
  @endforeach
  </tbody>
  </table>
  @endif
  

  <div class="modal fade" tabindex="-1" role="dialog" id="MessageModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="favoritesModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['url' => 'messages/update']) !!}
      <div class="modal-body message-modal">
        <p class="footer_paragraph"></p>
        
        {{Form::hidden('messageidx', '')}}

        {{Form::label('messageEmail', 'Email', ['class' => 'd-none'])}}
        {{Form::hidden('messageEmail', '', ['class'=>'form-control', 'placeholder' => 'Email'])}}

        {{Form::label('messageName', 'Name',['class' => 'd-none'])}}
        {{Form::hidden('messageName', '',  ['class'=>'form-control', 'placeholder' => 'Name'])}}
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::submit('', ['class' => 'btn btn-primary footer_action_button'])}}

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>


@endsection

@section('sidebar')
@parent
 This is the sidebar 
 <p>This is appended to the sidebar 
 </p>
@endsection


<script>

    
  
    
  
  
   </script>