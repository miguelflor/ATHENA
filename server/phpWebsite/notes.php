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
   th,td {
vertical-align:middle !important;
  
   
      }
</style>
<div class="modal" id="modal-time">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info" id="note">
    <button class="button is-large is-success is-rounded is-responsive b2" onclick="send_note()">
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
    get_notes();
}); 
function get_notes(){
    
    $.ajax({
            url:"get_note.php",
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
function send_note(){
    $("button").prop("disabled",true);
    var note = $("#note").val();
    
    $("#note").val("");
    $.ajax({
            url:"send_note.php",
            type:"POST",
            data:{value:note},
            success: function(data){
              get_notes();
           
              
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }

    });

}


function delete_note(id){
    $("button").prop("disabled",true);

    $.ajax({
            url:"delete_note.php",
            type:"POST",
            data:{value:id},
            success: function(data){
              get_notes();
             
  
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }

    });
}

</script>