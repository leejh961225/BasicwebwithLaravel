$(document).ready(function() {
          $('#Message_table').DataTable();
          $('#dashboard_tbl').DataTable();
          $("#chord").transpose();
    
/*

      
       $('.fa-reply').on('click', function(e){
                 var input = document.createElement('textarea');
                 input.name = 'post';
                 input.maxLength = 500;
                 input.className = 'myCustomTextarea';
                 input.rows = 3;
                 input.cols = 4;
                 var oBody = document.getElementById("comment-main-level-" + e.target.id);
                 oBody.appendChild(input);
                 console.log("comment-main-level-" + e.target.id);
                   //alert(clicked_id);
               
               });
*/
       
        $(".comment-main-level").on("click",".reply",function(e){

            $('.reply_comment').remove();
            $('.reply_comment_form').remove();
            $('.comment_reply_button').remove();
            $('.withreply').remove();
            
            var well = $(this).parent().parent();
            //var cid = $(this).attr("cid");
            //var name = $(this).attr('name_a');
            //var token = $(this).attr('token');
            var form = '<form method="post" id="reply_comment_form" action="replies/store"><div class="comment-box withreply"><textarea class="form-control reply_comment" name="reply" placeholder="Enter your reply" required > </textarea> </div> <div class="comment-content withreply"> <input class="btn btn-default comment_reply_button" value="답글달기" type="submit"> </div></form>';
            var id = e.target.id;
            well.append(form);
            console.log(form + id);


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

       
        