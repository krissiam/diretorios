<?php
include("mpdf60/mpdf.php");

$html ="
	 <fieldset>
	 	<h1>Recibo</h1>
	 	<p class='center sub-titulo'>
	 		Nº <strong>0001</strong> - 
	 		VALOR <strong>R$ 500,00</strong>
	 	</p>
	 	<p>Recebi(emos) de <strong>Cicrano da Silva Fulano</strong></p>
	 	<p>a quantia de <strong>Quinhentos Reais</strong></p>
	 	<p>Correspondente a <strong>Serviços prestados ..<strong></p>
	 	<p>e para clareza firmo(amos) o presente.</p>
	 	<p class='direita'>Cidade do Fulano - Estado, 28 de junho de 2017</p>
	 	<p>Assinatura ......................................................................................................................................</p>
	 	<p>Nome <strong>Fulano da Silva Cicrano</strong> CPF/CNPJ: <strong>222.222.222-02</strong></p>
	 	<p>Endereço <strong>Rua do Fulano, 200 - Jd. Alguma Coisa - Estado do Fulano</strong></p>
	 </fieldset>";

    $mpdf=new mPDF();
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("css/estilo.css");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();

	exit;