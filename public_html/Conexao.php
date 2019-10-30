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
  
  function Conexao(){
    //locaweb : $this->servidor =  '186.202.152.71';
    $this->servidor =  '216.172.172.44';
    $this->sqluser = 'aquifi88_aquifin';
    $this->sqlpword = 'CharlottE93';
    $this->db =  'aquifi88_aquifinanciame';
    $this->banco = 'mysql';
  }  
  
  function ConexaoMySqli(){
    return new mysqli('216.172.172.44','aquifi88_aquifin','CharlottE93','aquifi88_aquifinanciame');
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