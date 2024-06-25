<?php


$id = $_SESSION["id"];
$q = "SELECT name,real_name FROM users WHERE id = $id";
$r = mysqli_query($conn,$q);

$row = mysqli_fetch_assoc($r);

$username = $row["name"];
$name = $row["real_name"];


?>
<style>
    .aquiaqui{
        background-color: white !important;
        text-align: center;
    }
    button{
        padding-left: 10px;
    }
    .margin-top{
        margin-top: 15px !important;
    }
  
</style>

<div class="container aquiaqui">

<div class="modal" id="modal-username">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info" id="username">
    <button class="button is-large is-success is-rounded is-responsive b2 margin-top" onclick="send_username()">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

<div class="modal" id="modal-name">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info" id="name">
    <button class="button is-large is-success is-rounded is-responsive b2 margin-top" onclick="send_name()">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

<div class="modal" id="modal-pass">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <div class="control has-icons-left ">
                                <input class="input is-info is-normal is-rounded" id="old" placeholder="Old Password" type="password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock fa-lock"></i>
                                </span>
                            </div>
                            <div class="control has-icons-left" >
                                <input class="input is-info is-normal is-rounded" id="new" placeholder="New Password" type="password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock fa-lock"></i>
                                </span>
                            </div>
                            <div class="control has-icons-left" >
                                <input class="input is-info is-normal is-rounded" id="conf" placeholder="Confirm" type="password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock fa-lock"></i>
                                </span>
                            </div>
  
    <button class="button is-large is-success is-rounded is-responsive b2 margin-top" onclick="send_pass()">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

<h1 class="title is-1">User settings</h1>


    <h4 class="title is-4 f" id="username_h">
        Username: <?php echo $username;?> 
        <button class="button is-small is-success is-rounded is-responsive b1 js-modal-trigger" data-target="modal-username">
                        <span class="icon">
                        <i class="fas fa-solid fa-pen"></i>
                        </span>
                    </button>
    </h4>
    <h4 class="title is-4 f" id="name_h">
        Name: <?php echo $name; ?>
        <button class="button is-small is-success is-rounded is-responsive b1 js-modal-trigger" data-target="modal-name">
                        <span class="icon">
                        <i class="fas fa-solid fa-pen"></i>
                        </span>
                    </button>
    </h4>
    <h4 class="title is-4 f">
        Pass: ******* <button class="button is-small is-success is-rounded is-responsive b1 js-modal-trigger" data-target="modal-pass">
                        <span class="icon">
                        <i class="fas fa-solid fa-pen"></i>
                        </span>
                    </button>
    </h4>


</div>

<script>
 

function send_username(){
    
    var username = $("#username").val();
    
    $("#note").val("");
    if(username!=""){
        $("button").prop("disabled",true);

        
        $.ajax({
                url:"send_username.php",
                type:"POST",
                data:{username:username},
                success: function(data){
                    alert("username has been updated!");  
                    html_H = "Username: "+username+" <button class='button is-small is-success is-rounded is-responsive b1 js-modal-trigger' data-target='modal-username'><span class='icon'><i class='fas fa-solid fa-pen'></i></span></button>";
                    $("#username_h").html(html_H);
                    $("button").prop("disabled",false);  
                
                },
                error:function(xhr,status,error){
                    console.log(xhr.responseText);
                    $("button").prop("disabled",false);
                    
                    
                }

        });
    }
}

function send_name(){
    
    var name = $("#name").val();
    
    $("#name").val("");
    if(name!=""){
        $("button").prop("disabled",true);
        $.ajax({
                url:"send_name.php",
                type:"POST",
                data:{name:name},
                success: function(data){
                    alert("name has been updated!");  
                    html_H = "Name: "+name+" <button class='button is-small is-success is-rounded is-responsive b1 js-modal-trigger' data-target='modal-name'><span class='icon'><i class='fas fa-solid fa-pen'></i></span></button>";
                    $("#name_h").html(html_H);
                    $("button").prop("disabled",false);  
                
                },
                error:function(xhr,status,error){
                    console.log(xhr.responseText);
                    $("button").prop("disabled",false);
                    
                    
                }

        });
    }    
}

function send_pass(){
    
    var old = $("#old").val();
    var neww = $("#new").val();
    var conf = $("#conf").val();
    
    $("#old").val("");
    $("#new").val("");
    $("#conf").val("");
    

   
    if(old!="" && neww!="" && conf!=""){
        $("button").prop("disabled",true);
        $.ajax({
            url:"send_pass.php",
            type:"POST",
            data:{
                old:old,
                neww:neww,
                conf:conf
                
            },
            success: function(data){
                    console.log(data);
                    if(data=="old_diff"){
                        alert("the password is incorrect!");
                    }else if(data=="new_diff"){
                        alert("the new password doesn't match!");
                    }else{
                        alert("pass has been updated!");  
                    }
                    
                   
                    $("button").prop("disabled",false);  
                
                },
                error:function(xhr,status,error){
                    console.log(xhr.responseText);
                    $("button").prop("disabled",false);
                    
                    
                }

        });
    }    
}




</script>