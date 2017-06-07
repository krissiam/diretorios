<?
/*Criado por: Krissia Menezes
 *Data: 08/05/2017
 *
 * */
    function apagaArquivos($dir) {
        $hoje1 = $_REQUEST['data'];// pega da url a data que se deseja excluir os arquivos

        if($hoje1!=''){
            $hoje = $hoje1;// se tiver sido definida uma data exclui os arquivos dessa data
        }
        else{
            $hoje = date("dmY"); // se não tiver sido defida uma data, exclui os arquivos da data atual
        }
        if($arquivo = glob($dir."/*")){

            foreach($arquivo as $arquivos) {

                $dataArquivo = date("dmY",filemtime("$arquivos"));// pega a data dos arquivo
                $extensao =  pathinfo($arquivos, PATHINFO_EXTENSION); // pega a extensão do arquivo
                if($dataArquivo == $hoje && $extensao=='html'){// se a data do arquivo for igual a data definida e a extensão for html

                       $sucesso = unlink($arquivos);// exclui o arquivo

                       if($sucesso){
                           echo "Arquivo <b>$arquivos</b> excluído com sucesso!<br>";
                       }
                       else{
                           echo "Não foi possível excluir o arquivo <b>$arquivos</b>!<br>";
                       }
                }
            }
        echo "Todos arquivos excluidos!";
        }
    }
    apagaArquivos('diretorio');// diretorio onde estao os arquivos a serem apagados
?>




