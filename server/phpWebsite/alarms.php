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

</style>
<div class="modal" id="modal-time">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="time" class="input is-info without_ampm" id="alarm">
    <button class="button is-large is-success is-rounded is-responsive b2" onclick="send_alarm()">
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

<button class="button is-large is-medium is-success is-rounded is-responsive b1 js-modal-trigger" data-target="modal-time" >
    <span class="icon">
    <i class="fas fa-solid fa-plus"></i>
    </span>
</button>

<script>
 
$( document ).ready(function() {
    get_alarms();
}); 
function get_alarms(){
    
    $.ajax({
            url:"get_alarm.php",
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
function send_alarm(){
    
    var alarm = $("#alarm").val();
    
    $("#alarm").val("");
    
    var mudar = 0;
    var mudar1 = 0;
    
    if(alarm[0]=="0"){
        mudar = 1;
    }
    if(alarm[3]=="0"){
        mudar1 = 1;
        
    }
    console.log(mudar);
    if(mudar1 == 1 && mudar == 1){
        mudar = 0;
        mudar1 = 0;
        alarm = alarm.split('');
        alarm.splice(0,1);
        alarm.splice(2,1);
        alarm = alarm.join('');
        
    }
    if(mudar==1){
        alarm = alarm.split('');
        alarm.splice(0,1);
        alarm = alarm.join('');
        
        
    }
    if(mudar1 == 1){
        alarm = alarm.split('');
        alarm.splice(3,1);
        
        alarm = alarm.join('');
        
    }
    
    console.log(alarm);
    if(alarm!=""){
        $("button").prop("disabled",true);
        $.ajax({
            url:"send_alarm.php",
            type:"POST",
            data:{value:alarm},
            success: function(data){
              get_alarms();
              
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }

    });
    }
    

}


function delete_alarm(id){
    $("button").prop("disabled",true);

    $.ajax({
            url:"delete_alarm.php",
            type:"POST",
            data:{value:id},
            success: function(data){
              get_alarms();
             
  
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }

    });
}

</script>