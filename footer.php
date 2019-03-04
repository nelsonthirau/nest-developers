<script src="jquery-1.11.1.min.js"></script>  
  <script src="js/bootstrap.min.js"></script>  
  <script src="js/script.js"></script>  
  <script>
  $(document).ready(function(){
      $(".hover").hover(function(){
          //$(this).addClass('orange');
          $(this).css({"color":"rgb(255, 88, 33)","background":"white"});
      },function(){
          //$(this).removeClass('orange');
          //$(this).removecss();
          $(this).css({"color":"black","background":""});
      });

      $('.dropdown').hover(function(){
          $('.dropdown-menu').show();
      },function(){
          $('.dropdown-menu').hide();
      });
      $('.unique').hover(function(){
        $(this).css({"color":"rgb(255, 88, 33)"});  
      },function(){
        $(this).css({"color":""}); 
      });


      $("#cpassword").keyup(function(){
          if($(this).val() !=$("#password").val()){
              $(this).css("border-color","red");
              $("#cptest").html('<p style="color:red">Passwords do not match</p>');
          }else{
            $(this).css("border-color","green");
            $("#cptest").html('<p style="color:green">Passwords match</p>');
          }
      });

      
      $("#registerr").on('click',function(){
          var character=/^[a-zA-Z]*$/;
          var phonetest=/^0[0-9].*$/;
          var firstname=$("#firstname").val();
          var lastname=$("#lastname").val();
          var contacts=document.getElementById('contacts').value;
          var address=$("#address").val();
          var email=$("#email").val();
          var username=$("#username").val();
          var password=$("#password").val();
          var cpassword=$("#cpassword").val();
          $("#response").html('');

          if(character.test(firstname)==false){
              $("#ftest").html('<p style="color:red">**Firstname must be characters only**</p>');
              $("#firstname").focus();
             
              return false;

          }else if(firstname==""){
            $("#ftest").html('<p style="color:red">**Firstname required**</p>');
            $("#firstname").focus();
            $("#firstname").keyup(function(){
                
                    $("#ftest").html('');   
            });
              return false;
          }
          else if(lastname==""){
            $("#ltest").html('<p style="color:red">**Lastname required**</p>');
            $("#lastname").focus();
              return false;

          }
          else if(character.test(lastname)==false){
            $("#ltest").html('<p style="color:red">**Lastname must be characters only**</p>');
            $("#lastname").focus();
              return false;


            }
          else if(contacts==""){
            $("#ctest").html('<p style="color:red">**contacts required**</p>');
            $("#contacts").focus();
              return false;

          }
          else if(character.test(contacts)==false){
            $("#ctest").html('<p style="color:red">**contacts must be digits only**</p>');
            $("#contacts").focus();
              return false;



            }
          else if(lastname==""){
            $("#ltest").html('<p style="color:red">**Lastname required**</p>');
            $("#lastname").focus();
              return false;

          }
          else if(character.test(lastname)==false){
            $("#ltest").html('<p style="color:red">**Lastname must be characters only**</p>');
            $("#lastname").focus();
              return false;






          }else{
              var urll="register.php";
              var dataString="fname="+firstname+"&lname="+lastname+"&contacts="+contacts+"&address="+address+"&email="+email+"&username="+username+"&password="+password;

              $.ajax({
                  type:"POST",
                  url:urll,
                  data:dataString,
                  cache:false,
                  beforeSend:function(){
                      $("#load").html('<p style="float:left;padding-bottom:20px" class="orange"><i class="fa fa-spinner fa-spin" style="font-size:25px"></i> &nbsp;&nbsp;Registering...Please wait...</p>');
                  },
                  success:function(data){
                      var res=data.indexOf('read');
                      if(res !=-1){
                          $("#load").html(data);
                      }else{
                       $("#load").html(data);
                       $("#firstname").val('');
                       $("#lastname").val('');
                      }

                  }


              });
              return true;
          }
        
      });
     $("#approve").on('click',function(){
         alert('success');
     });
      


      
  });
 
  function login(){
         var account=$("#account").val();
         var username=$("#lusername").val();
         var password=$("#lpassword").val();
         var dataString="account="+account+"&user="+username+"&password="+password;
         var redirect="login.php";
         $.ajax({
             type:"POST",
             data:dataString,
             url:redirect,
             cache:false,
             beforeSend:function(){
                 $("#report").html('<p style="float:left;padding-bottom:20px" class="orange"><i class="fa fa-spinner fa-spin" style="font-size:25px"></i> &nbsp;&nbsp;Please wait...</p>');
             },
             success:function(see){
                 if(see.indexOf('5')>-1){
                     $("#report").html('');
                     $("#report").html('<div style="background-color:red;padding:10px;color:white;float:left">Username and password cannot be empty</div>');

                 }
                 else if(see.indexOf('3')>-1){
                     $("#report").html('');
                     $("#report").html('<div style="background-color:red;padding:10px;color:white;float:left">Wrong username or password</div>');

                 }
                else if (see.indexOf('2')>-1){
                    
                     window.location.href="admin.php";
                     
                 }else if(see.indexOf('4')>-1){
                    $("#report").html('');
                     $("#report").html('user');

                 }
                
              
               

                 


             }
         });
      }



function manage(){
    
   $("#content").load("manage.php");
}

    
  </script>
</body>



</html>