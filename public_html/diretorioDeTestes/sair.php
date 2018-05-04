<?php
  session_start();
  if(isset($_SESSION['usuario']))
    unset($_SESSION['usuario']);
  if(isset($_SESSION['nivel']))
    unset($_SESSION['nivel']);    
  if(isset($_SESSION['id']))
    unset($_SESSION['id']);    
  if(isset($_SESSION['ref']))
    unset($_SESSION['ref']); 
  session_destroy();
  header('Location: http://www.aquifinanciamentos.com.br/');
?>