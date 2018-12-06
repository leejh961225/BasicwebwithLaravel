<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AW-beta') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.transposer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/commentbox.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

</head>
<body>
    @include('inc.navbar')
    <div id="app">
        <div class="container">
            @if(Request::is('/'))
            @include('inc.showcase')
            @endif
            
            <div class="row">
              <!-- 메세지탭 -->
              <div class="col-md-8 col-lg-8">
              @include('inc.messages')
              @yield('content')
              </div>

              <!-- 사이드바 -->
              <div class="col-md-6 col-lg-4">
              @include('inc.sidebar')
              </div>
            </div><!-- end of "row" -->
            
            
          </div>
            
          <footer id="footer" class="text-center"> 
              <p>Copyright 2018 &copy; Jaehun Lee</p>
            </footer>
    </div>



  <script src="//code.jquery.com/jquery-1.12.3.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/js/jquery.transposer.js"></script>

  <script>
        $(document).ready(function() {
          $('#Message_table').DataTable();
          $('#dashboard_tbl').DataTable();
          $("#chord").transpose();
    

          //comment reply button
          $('.fa-reply').on('click', function(e){
            alert('hi! this script is at views/layouts/ app.blade.php');
          });

          //Delete Post
           $('#Post_Delete_Modal').on('shown.bs.modal', function (e) {
            var link = $(e.relatedTarget); // Button that triggered the modal
            var link_id = link.attr('data-post');
            console.log(link_id);
            //layout updating
            $('.footer_action_button').val("Delete this post");
            $('.modal-title').text('Post Delete Confirmation');
            jQuery('#Post_Delete_Modal').find("input[name='postId']").val(link_id);
    
        });
    
          //Delete or Edit Messages
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
        CKEDITOR.replace( 'article-ckeditor' );
        CKEDITOR.editorConfig = function( config )
        {
            // Define changes to default configuration here. For example:
            // config.language = 'fr';
            // config.uiColor = '#AADC6E';
            config.height = '800px';
        };
        </script>
    </body>
</html>
