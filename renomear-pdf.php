<?php
/*Criado por Krissia Menezes
Em: 09/02/2017
Função: Renomear arquivos que contenham espaços e/ou traços no nome
*/
$diretorio = opendir( './' );// abre o diretório
$arquivos = glob("{*.pdf}", GLOB_BRACE);//arquivos pdf
foreach($arquivos as $nome_arquivo) {
    $conta_espaco = substr_count($nome_arquivo, ' ');// conta quantos espaços tem no nome do arquivo
    $conta_traco = substr_count($nome_arquivo, '-');// conta quantos traços tem no nome do arquivo
    $conta_underline = substr_count($nome_arquivo, '_');// conta quantos underlines tem no nome do arquivo
    /*Alterado por Krissia Menezes
      *Em: 28/03/2017
      *Função: Renomear arquivos que contenham _ antes do .php*/
    $explode = (explode(".pdf", $nome_arquivo));
    $semphp = trim($explode[0]);//retira tudo que vem antes de .pdf no nome do arquivo
    $rest = substr($semphp, -1);
    $a ="_";
    if($rest=='_'){
        $novo_nome = substr($semphp, 0, -1).'.pdf';
        $renomear = rename($nome_arquivo, $novo_nome);
        echo $novo_nome;
    }
    switch ($nome_arquivo) {
        //Renomeia arquivos que contem espaços no nome
        case ($conta_espaco > 0 && $conta_traco < 1):
            $str = (explode(".pdf", $nome_arquivo));
            $retira = trim($str[0]);//retira tudo que vem antes de .pdf no nome do arquivo
            $novo_nome = str_replace(' ', '_', $retira) . '.pdf';
            $renomear = rename($nome_arquivo, $novo_nome);
            echo "Arquivo renomeado: ". $novo_nome."<br>";
            break;
        //Renomeia os arquivos que contem traços no nome
        case ($conta_traco > 0 && $conta_espaco < 1):
            $str = (explode(".pdf", $nome_arquivo));
            $retira = trim($str[0]);//retira tudo que vem antes de .pdf no nome do arquivo
            $novo_nome = str_replace('-', '_', $retira) . '.pdf';
            $renomear = rename($nome_arquivo, $novo_nome);
            echo "Arquivo renomeado: ". $novo_nome."<br>";
            break;

        //Renomeia os arquivos que contem espacos  e traços no nome
        case ($conta_traco > 0 && $conta_espaco > 0):
            $str = (explode(".pdf", $nome_arquivo));
            $retira = trim($str[0]);//retira tudo que vem antes de .pdf no nome do arquivo
            $novo_nome = str_replace('-', '_', $retira);
            $novo_nome2 = str_replace(' ', '_', $novo_nome). '.pdf';
            $renomear = rename($nome_arquivo, $novo_nome2);
            echo "Arquivo renomeado: ". $novo_nome2."<br>";
            break;

        //Renomeia os arquivos que contem __ no nome
        case ($conta_underline > 3 && $conta_espaco < 1 && $conta_traco < 1):
            $str = (explode(".pdf", $nome_arquivo));
            $retira = trim($str[0]);//retira tudo que vem antes de .pdf no nome do arquivo
            $novo_nome = str_replace('__', '_', $retira) . '.pdf';
            $renomear = rename($nome_arquivo, $novo_nome);
            echo "Arquivo renomeado: ". $novo_nome."<br>";
            break;

        default:
            echo "PDF's com nome ok!<br>";
    }



}
closedir($diretorio);
?>
