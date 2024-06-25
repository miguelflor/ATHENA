<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ATHENA</title>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
          background-color:#BBF7EF;
      }
      
      
   
      
  </style>


  <body class="has-navbar-fixed-top">
    
    
  <nav id="navMenu" class="navbar is-fixed-top is-light" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
      
      <a href="index.php?page=1" class="navbar-item">
      <img src="logo_full.png" alt="">
      </a>
          
     
       
        <a class="navbar-item is-hidden-desktop" href="logout.php"><i class="far fa-solid fa-right-from-bracket"></i></a>
        <div id="navbar-burger-id" class="navbar-burger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div id="navbar-menu-id" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="index.php?page=2">Patterns</a>
          <a class="navbar-item" href="index.php?page=3">Notes</a>
          <a class="navbar-item" href="index.php?page=4">Alarms</a>
          <a class="navbar-item" href="index.php?page=5">Contacts</a>
        </div>
        <div class="navbar-end">
        <a class="navbar-item is-hidden-touch" href="logout.php"><i class="far fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </div>
  </nav>
 
  
<section class="section">
  <div class="hero-body">
  <?php
   session_start();
   require("conn.php");
   if(!isset($_SESSION["id"])){
    header("Location:login.php");
   }else{
     $id =$_SESSION["id"];
   }
   if(!isset($_GET["page"])){
      $p = 1;
   }else{
      $p = $_GET["page"];
   }
   if($p==1){
       include("main.php");
   }elseif($p==2){
     include("patterns.php");
   }elseif($p==3){
     include("notes.php");
   }elseif($p==4){
     include("alarms.php");
   }elseif($p==5){
    include("contacts.php");
   }
   else{
       include("main.php");
   }
   
   ?>
  </div>
</section>


  </body>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <script>
    // modal coisas
    document.addEventListener('DOMContentLoaded', () => {
  // Functions to open and close a modal
  function openModal($el) {
    $el.classList.add('is-active');
  }

  function closeModal($el) {
    $el.classList.remove('is-active');
  }

  function closeAllModals() {
    (document.querySelectorAll('.modal') || []).forEach(($modal) => {
      closeModal($modal);
    });
  }

  // Add a click event on buttons to open a specific modal
  (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);

    $trigger.addEventListener('click', () => {
      openModal($target);
    });
  });

  // Add a click event on various child elements to close the parent modal
  (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button,.b2') || []).forEach(($close) => {
    const $target = $close.closest('.modal');

    $close.addEventListener('click', () => {
      closeModal($target);
    });
  });

  // Add a keyboard event to close all modals
  document.addEventListener('keydown', (event) => {
    const e = event || window.event;

    if (e.keyCode === 27) { // Escape key
      closeAllModals();
    }
  });
});


       $('.navbar-item').each(function(e) {
    $(this).click(function(){
      if($('#navbar-burger-id').hasClass('is-active')){
        $('#navbar-burger-id').removeClass('is-active');
        $('#navbar-menu-id').removeClass('is-active');
      }
    });
  });

  // Open or Close mobile & tablet menu
  $('#navbar-burger-id').click(function () {
    if($('#navbar-burger-id').hasClass('is-active')){
      $('#navbar-burger-id').removeClass('is-active');
      $('#navbar-menu-id').removeClass('is-active');
    }else {
      $('#navbar-burger-id').addClass('is-active');
      $('#navbar-menu-id').addClass('is-active');
    }
  });
  </script>
</html>