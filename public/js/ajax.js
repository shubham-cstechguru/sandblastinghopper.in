$(function(){
    
    
$("#inquiry_form").on('submit', function(e){
    e.preventDefault();
    
    var url =  $(this).attr('data-url');
    var name = $('#user_name').val();
    var email = $('#user_email').val();
    var mobile_number = $('#user_mobile').val();
    var country = $('#user_country').val();
    var message = $('#user_message').val();
    
   $.ajax({
          url:url,
          type:"POST",
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data:{
            name:name,
            email:email,
            mobile_number:mobile_number,
            country:country,
            message:message
          },
          success:function(response){
              
              if(response.status){
                   $("#ajax_message").html();
                  $("#ajax_message").html("Successfull");
              }
            else{
                 $("#ajax_message").html();
                 $("#ajax_message").html('faild');
            }
            
          },
    });
});
$("#contact_form").on('submit', function(e){
    e.preventDefault();

    var url         =  $(this).attr('data-url');
    var name        = $('#contact_name').val();
    var mobile_no   = $('#contact_mobile').val();
    var email       = $('#contact_email').val();
    var country       = $('#contact_country').val();
    var message     = $('#contact_message').val();
    
    
   $.ajax({
          url:url,
          type:"POST",
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data:{
            name      : name,
            mobile_no : mobile_no,
            email     : email,
            country   : country,
            message   : message,
           
          },
          success:function(response){
              
              if(response.status){
                  document.getElementById("contact_form").reset();
                  $("#res_message").html();
                  $("#res_message").html("Sent Successfully");
              }
            else{
                 $("#res_message").html();
                 $("#res_message").html('faild');
            }
            
          },
    });
    document.getElementById("contact_form").reset();
});
    
})