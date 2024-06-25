<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="fontawesome/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  </head>
  <style>
      body{
          background-color:#BBF7EF;
          margin: 0;
          height: 100%;
      }
      html{
          margin:0;
          height:100%;
      }
      .logo{
          width:30%;
      }  
        .box {
        background-color: white;
        box-shadow: 10px 5px 5px rgb(0,0,0, 0.3);
        position: absolute;
        top: 50%;
        left: 50%;
        width:40%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);

        text-align:center;
     
        }
        @media screen and (max-width: 540px) {
            .box{
                width:90% !important;
            }
        }
   
      
  </style>
  <body>    

            <div class="box">
                <div class="field">
                <img src="logo_full.png" alt="" class="logo">
                </div>
                
                        <h1 class="title is-1">Login</h1>
                        <div class="field">

                          
                            <div class="control has-icons-left" id="username">
                                <input class="input is-info is-normal is-rounded" id="user" type="text" placeholder="Username">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>

                        </div>
                        <div class="field">

                        
                            <div class="control has-icons-left" id="username">
                                <input class="input is-info is-normal is-rounded" id="pass" placeholder="Password" type="password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock fa-lock"></i>
                                </span>
                            </div>

                        </div>
                        <div class="field">
                            <button class="button is-info is-outlined is-rounded"id="login">
                                Login
                            </button>
                        </div>
                 
            </div>
       
  
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $("#login").click(function(){
        $(this).toggleClass('is-loading');
        var name = $("#user").val();
        var pass = $("#pass").val();

        $.ajax({
            url:"loginn.php",
            type:"POST",
            data: {username:name,pass:pass},
            success: function(data){
                
                if(data=="ok"){
                    $("#login").removeClass('is-loading');
                    window.location.href = "index.php";

                }else{
                    Swal.fire({
                    icon:"error",
                    title:"",
                    text:"Wrong password or username"
                    });
                    $("#login").removeClass('is-loading');
                }
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                Swal.fire({
                    icon:"error",
                    title:"Oops..",
                    text:xhr.responseText
                });
                
            }

        });
      });
  </script>
</html>