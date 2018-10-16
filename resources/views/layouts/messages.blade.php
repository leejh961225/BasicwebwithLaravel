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
            <td><center><button class="btn btn-primary"   style="height:30px;width:80px" id="Edit_{{$message->id}}" data-info="{{$message->id}},{{$message->name}},{{$message->email}}" data-toggle="modal" data-target="#deletemodal">Edit</button> 
            <button type="button" class="btn btn-danger"  style="height:30px;width:80px" id="delete_{{$message->id}}" data-info="{{$message->id}},{{$message->name}},{{$message->email}}">Delete</button></center></td>
        </tr>
    
  
   
  @endforeach
  </tbody>
  </table>
  @endif
  <!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>


<script>
  $(document).ready(function() {
    $('#Message_table').DataTable();

    $('#delete_1').on('click', function() {
      $('deletemodal').modal();
    });
} );

 </script>