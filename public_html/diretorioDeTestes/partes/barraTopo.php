<div id="barraTopo">
  <nav id="navTopo">
    <?php
      if($voltar=='voltar')
        echo '<a href="../" style="float:right;">Voltar</a>';
      else if($voltar=='sair')
        echo '<a href="../sair.php" style="float:right;">Sair</a>';
      else
        echo '<a href="loja/" style="float:right;">Acesso Loja</a>';
      
    ?>
  </nav>
</div>