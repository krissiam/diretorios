<?php
/*
 * Criado por Krissia Menezes
 * Em: 25/054/2017
 * Função: Gerar um cartão de contato
 * */
$id = @$_REQUEST["id"];
$arquivo = fopen("vCard/".$id.".vcf", "w");
$nome   = @$_REQUEST["nome"];
$email  = @$_REQUEST["email"];
$numero = @$_REQUEST["telefone"];
$texto  = "BEGIN:VCARD"."\n"."FN:".$nome."\n"."EMAIL:".$email."\n"."TEL;TYPE=cell,voice;VALUE=uri:".$numero."\n"."END:VCARD";

fwrite($arquivo, $texto);
fclose($arquivo);
?>