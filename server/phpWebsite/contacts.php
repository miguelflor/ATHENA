<style>
   .b1{
    position:absolute;
    bottom:0%;
    right:0%;
    margin:10px;
   }
   .c5{
       text-align: center;
   }
   .b2{
       margin:30px
   }
   .table th{
        vertical-align: middle !important;
        text-align: center !important;
   
    }
    .cont{
        margin-top: 5px !important;
    }
    
</style>
<div class="modal" id="modal-time">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info cont" placeholder="name" id="contact">
    <input type="text" class="input is-info cont" placeholder="number" id="number" >
    <button class="button is-large is-success is-rounded is-responsive b2" onclick="send_contact()">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>
<div id="table">
    
</div>
<button class="button is-large is-success is-rounded is-responsive b1 js-modal-trigger" data-target="modal-time">
    <span class="icon">
    <i class="fas fa-solid fa-plus"></i>
    </span>
</button>

<script>
 
$( document ).ready(function() {
    get_contacts();
}); 
function get_contacts(){
    
    $.ajax({
            url:"get_contacts.php",
            type:"POST",
            success: function(data){
                $("#table").html(data);
                $("button").prop("disabled",false);
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }

        });
}
function send_contact(){
    error = 0
    $("button").prop("disabled",true);
    var contact = $("#contact").val();
    var number = $("#number").val();
    number = Number(number);
    if(number == "NaN"){
        error = 1;
    }
    if(typeof(number) != "number")
    {
        error=1;
    }
    if(contact == ""){
        error = 1
    }
    if(error == 0){
    $("#contact").val("");
    contact = contact.toLowerCase();
    $.ajax({
            url:"send_contact.php",
            type:"POST",
            data:{
                value:contact,
                number:number
                },
            success: function(data){
              get_contacts();
              $("#contact").val("");
              $("#number").val("");
              
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }

    });

    }
    
}


function delete_contact(id){
    $("button").prop("disabled",true);

    $.ajax({
            url:"delete_contact.php",
            type:"POST",
            data:{value:id},
            success: function(data){
              get_contacts();
             
  
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }

    });
}

</script>