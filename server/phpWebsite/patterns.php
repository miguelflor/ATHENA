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
        /* text-align: center !important; */
   
    }
    .okth{
        text-align: right !important;
    }
    .cont{
        margin-top: 5px !important;
    }
    
</style>


<!-- TABLES -->
<h5></h5>
<table class='table is-striped is-narrow is-hoverable is-fullwidth' id="goodbye">
    <thead>
        <tr>
        <th>Goodbyes</th>
  <th class="okth"><button class="button is-large is-success is-rounded is-responsive js-modal-trigger" data-target="modal1">
    <span class="icon">
    <i class="fas fa-solid fa-plus"></i>
    </span>
</button></th>
            
        </tr>
        
    </thead>
    <tbody>
    
    </tbody>
</table>
<h1></h1>
<table class='table is-striped is-narrow is-hoverable is-fullwidth' id ="greet">
    <thead>
        <tr>
        <th>greetings</th>
           <th class="okth"><button class="button is-large is-success is-rounded is-responsive js-modal-trigger" data-target="modal2">
    <span class="icon">
    <i class="fas fa-solid fa-plus"></i>
    </span>
</button></th>       
        </tr>
        
    </thead>
    <tbody>
    
    </tbody>
</table>
<h1></h1>
<table class='table is-striped is-narrow is-hoverable is-fullwidth' id="note">
    <thead>
        <tr>
        <th>adding a note</th>
    <th class="okth"><button class="button is-large is-success is-rounded is-responsive js-modal-trigger" data-target="modal3">
    <span class="icon">
    <i class="fas fa-solid fa-plus"></i>
    </span>
</button></th>
        </tr>
        
    </thead>
    <tbody>
    
    </tbody>
</table>
<h1></h1>
<table class='table is-striped is-narrow is-hoverable is-fullwidth' id="ask">
    <thead>
        <tr>
        <th>learning</th>
       <th class="okth"><button class="button is-large is-success is-rounded is-responsive js-modal-trigger" data-target="modal4">
    <span class="icon">
    <i class="fas fa-solid fa-plus"></i>
    </span>
</button></th>
            
        </tr>
        
    </thead>
    <tbody>
    
    </tbody>
</table>
<h1></h1>
<table class='table is-striped is-narrow is-hoverable is-fullwidth' id="time">
    <thead>
        <tr>
        <th>Tell Time</th>
        <th class="okth"><button class="button is-large is-success is-rounded is-responsive js-modal-trigger" data-target="modal5">
    <span class="icon">
    <i class="fas fa-solid fa-plus"></i>
    </span>
</button></th>
            
        </tr>
        
    </thead>
    <tbody>
    
    </tbody>
</table>
<!--TABLES-->







<!-- MODALS -->
<div class="modal" id="modal1">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info cont" placeholder="" id="pattern1">
    
    <button class="button is-large is-success is-rounded is-responsive b2" onclick="send_pattern(1)">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>

</div>

<div class="modal" id="modal2">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info cont" placeholder="" id="pattern2">
    
    <button class="button is-large is-success is-rounded is-responsive b2" onclick="send_pattern(2)">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>

</div>

<div class="modal" id="modal3">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info cont" placeholder="" id="pattern3">
    
    <button class="button is-large is-success is-rounded is-responsive b2" onclick="send_pattern(3)">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>

</div>

<div class="modal" id="modal4">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info cont" placeholder="" id="pattern4">
    
    <button class="button is-large is-success is-rounded is-responsive b2" onclick="send_pattern(4)">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>

</div>

<div class="modal" id="modal5">
  <div class="modal-background"></div>
  <div class="modal-content c5">
    <div class="container">
    <input type="text" class="input is-info cont" placeholder="" id="pattern5">
    
    <button class="button is-large is-success is-rounded is-responsive b2" onclick="send_pattern(5)">
        <span class="icon">
        <i class="fas fa-solid fa-paper-plane"></i>
        </span>
    </button>
    </div>
    
  </div>
  <button class="modal-close is-large" aria-label="close"></button>

</div>

<!-- MODALS -->




<script>
 
$( document ).ready(function() {
    get_patterns();
}); 

function get_patterns(){
    arr = new Array();
    $.ajax({
            url:"get_pattern.php",
            type:"POST",
            success: function(data){
                arr = data;
                console.log(arr);
                $("button").prop("disabled",false);


                
             

                $("#goodbye > tbody").html(data[0]);
                $("#greet > tbody").html(data[1]);
                $("#note > tbody").html(data[2]);
                $("#ask > tbody").html(data[3]);
                $("#time > tbody").html(data[4]);
                
                $("button").prop("disabled",false);
            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            },
            dataType:"json"

        });
}
function send_pattern(n_int){
    var intent = "";
    if (n_int==1){
        intent = "goodbyes";
    }
    else if(n_int==2){
        intent = "greet";
    }else if(n_int == 3){
        intent="new_note";
    }else if(n_int== 4){
        intent = "questions";
    }else if(n_int==5){
        intent = "tell_time";
    }
    
    var pattern = $("#pattern"+n_int.toString()).val();
    $("button").prop("disabled",true);
    if(pattern!=""){
        $.ajax({
            url:"send_pattern.php",
            type:"POST",
            data:{
                intent:intent,
                pattern:pattern
            },
            success: function(data){
               
                get_patterns();
                console.log("aqui");
                $("#pattern"+n_int.toString()).val("")
                

            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }
          

        });
        
       
    }


}

function delete_pattern(value){
    $("button").prop("disabled",true);
    $.ajax({
            url:"delete_pattern.php",
            type:"POST",
            data:{value:value},
            success: function(data){
            
                get_patterns();
              

            },
            error:function(xhr,status,error){
                console.log(xhr.responseText);
                
                
            }
       

        });
     
}




</script>