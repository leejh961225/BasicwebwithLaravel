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



<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script>

  $(document).ready(function() {
    $('#Message_table').DataTable();
    
    $('#MessageModal').on('shown.bs.modal', function (e) {
      var link = $(e.relatedTarget) // Button that triggered the modal
			var link_name = link.attr('data-info');
				link_name = link_name.split(",");
      
      var btn_type = link.attr('id');
          keyword = btn_type.split('_');
      switch(keyword[0]){

        case "Edit":
        //layout updating
        $('.footer_action_button').val("Update");
        $('.footer_action_button').removeClass('btn-primary btn-danger');
        $('.footer_action_button').addClass('btn-success');
        $('.modal-title').text('Edit Message');
        $('.footer_paragraph').text('Edit Message Sender`s info');


        jQuery('#MessageModal').find("label[for='messageEmail'] ").removeClass('d-none');
        jQuery('#MessageModal').find("label[for='messageName'] ").removeClass('d-none');

        //Change properties into text inputs
        jQuery('#MessageModal').find("input[name='messageEmail'] ").prop('type', 'email');
        jQuery('#MessageModal').find("input[name='messageName'] ").prop('type', 'text');

        //assinment of values
        jQuery('#MessageModal').find("input[name='messageidx']").val(link_name[0]);
        jQuery('#MessageModal').find("input[name='messageEmail'] ").val(link_name[2]);
        jQuery('#MessageModal').find("input[name='messageName'] ").val(link_name[1]);
        break;
        
        case "Delete":
        jQuery('#MessageModal').find("label[for='messageEmail'] ").addClass('d-none');
        jQuery('#MessageModal').find("label[for='messageName'] ").addClass('d-none');

        jQuery('#MessageModal').find("input[name='messageEmail'] ").prop('type', 'hidden');
        jQuery('#MessageModal').find("input[name='messageName'] ").prop('type', 'hidden');
        $('.footer_action_button').val("Delete");
        $('.footer_action_button').removeClass('btn-primary');
        $('.footer_action_button').addClass('btn-danger');
        $('.modal-title').text('Delete');
        $('.footer_paragraph').text('Are you sure you want to delete message from \n' + link_name[1] + "\n Email:" + link_name[2]);
        jQuery('#MessageModal').find("input[name='messageidx']").val(link_name[0]);

        break;
        
        default:
        break;

      }
       
       // var paragraph ='Are you sure you want to delete message from' + 
        
		  	//if (!data) return e.preventDefault() // stops modal from being shown
			
     
			//console.log(link_name[0],link_name[1],link_name[2]);
      
      
		});
} );

  


 </script>