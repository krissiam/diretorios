<html>
    <head>
        <meta http-equiv="refresh" content="3"><!--Atualliza a página a cada 3 segundos, isso evita que eu tenha que colocar esse script em uma tarefa cron-->
    </head>
    <body>
        <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1 );
        /*Criado por: Krissia Menezes
         *Data: 08/05/2017
         *
         */

        ini_set('gd.jpeg_ignore_warning', true);

        $arquivo = glob("data/anuncio/*");// pasta onde estão os arquivos de imagem

        foreach ($arquivo as $arquivos) {//imagens
            $txt = "imagens-comprimidas.txt";// arquivo txt que armazena o nome das imagens que já foram compridas e das imagens que o script não conseguiu comprimir
            $fd = fopen($txt, 'r');//Abre o arquivo
            $le_arquivo = fread($fd, filesize($txt));//Lê o arquivo
            $procura = stristr($le_arquivo,"$arquivos");//verifica se o nome da imagem está no arquivo imagens-comprimidas.txt

            if(!$procura){// se o nome da imagem não estiver no txt,  o script para comprimir é executado
                $extensao = pathinfo($arquivos, PATHINFO_EXTENSION);

                if ($extensao == 'jpg'){
                    $tumb = stristr($arquivos,"tumb");
                    $comp = stristr($arquivos,"-comp.jpg");

                    if(!$tumb && !$comp){//Não comprime arquivos que contenham tumb ou comp no nome, pois eles já estão comprimidos
                        $info = getimagesize($arquivos);

                        if ($info['mime'] == 'image/jpeg') {//Verifica se é uma image, jpg
                            $name = 'imagens-comprimidas.txt';
                            $text = $arquivos."\r\n";
                            $file = fopen($name, 'a');
                            fwrite($file, $text);
                            fclose($file);//salva o nome da imagem lida do txt,  para não passar por ela novamente

                            $image = imagecreatefromjpeg($arquivos);
                            $sucesso = imagejpeg($image, $arquivos, 85);//Comprime a imagem

                            if($sucesso){
                                echo $arquivos.' comprimido <br>';
                                echo '<img src="'.$arquivos.'" style="width: 595px; height: 334.192px; left: 0px; top: 55.9042px;">';

                            }

                            else{
                                echo $arquivos.' não comprimido <br>';
                                echo '<img src="'.$arquivos.'" style="width: 595px; height: 334.192px; left: 0px; top: 55.9042px;">';
                            }
                            exit();
                        }
                    }
                }
            }
        }
            echo "Todos arquivos comprimidos";
        ?>
    </body>
</html>