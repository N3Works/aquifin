<?php

class Conexao{
  private $servidor;
  private $sqluser;
  private $sqlpword;
  private $db;
  private $con;
  private $consulta = array();
  private $banco;
  
  /* Contrutores */
  
  function Conexao($servidor,$sqluser,$sqlpword,$db,$banco){
    $this->servidor = $servidor;
    $this->sqluser = $sqluser;
    $this->sqlpword = $sqlpword;
    $this->db = $db;
    $this->banco = $banco;
  }  
  
  /* Métodos de Conexão e Desconexão */
  public function conecta(){
    if($this->banco=="mysql")
      $this->con = new mysqli($this->servidor,$this->sqluser,$this->sqlpword,$this->db);
  }
  
  public function desconecta(){
    // if($this->banco=='mysql')
    //$this->con->close();
  }  
  
  /* Métodos de consulta */
  public function STMTSemPrepareDC($customSTMT,$select){
    if($this->banco=="mysql")
      $consulta = $this->con->query($customSTMT);
      if($select==true)
        return $consulta;
    desconecta();    
  }  
  
  public function STMTSemPrepare($customSTMT,$select){
    if($this->banco=="mysql"){
      $con = new mysqli($this->servidor,$this->sqluser,$this->sqlpword,$this->db);
      $consulta = $con->query($customSTMT);
      $con->close();
      if($select==true)
        return $consulta;
    }
  }
}
?>