 <?php
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: Teste Locaweb <contato@aquifinanciamentos.com.br>"."\n"; // remetente
$headers .= "Return-Path: Teste Locaweb <contato@aquifinanciamentos.com.br>"."\n"; // return-path
$envio = mail("wellington.silva@locaweb.com.br", "Teste Locaweb", "Teste Locaweb", $headers, "-r"."contato@aquifinanciamentos.com.br");

if($envio)
 echo "Mensagem enviada com sucesso";
else
 echo "A mensagem não pode ser enviada";
?> 
