<?php
  session_start();
  if(isset($_SESSION['nivel'])){
    if($_SESSION['nivel']==100)
      header('Location: ../gerencia/');    
    if($_SESSION['nivel']!=0)
      header('Location: loginLoja.php');
  }else 
    header('Location: loginLoja.php');
?>