<?
/*
 * Criado por: Krissia Menezes
 * Em
 * Função: Monitorar processos ativos no Banco de dados
 * */
    include("classes/class.Fachada.php");// Classe que conecta ao banco de dados

    $con        = new Conexao();
    $resultado  = $con->Execute('SELECT count(*) FROM information_schema.processlist') ;
    $processos = $resultado->fields[0];

    if($processos > 15) { // Se tiverem mais que 15 processos ativos no Banco de datos envia um email

        $mail = MailFactory::getMailer();
        $mail->Subject =  "Processos-Ativos";

        $mail->AddAddress('destinatario@mail.com');// Quem vai receber o email

        $mail->Body = "Existem $processos processos ativos no Banco de dados.";

        $mail->Send();

    }
    else{
        exit;
    }

?>
