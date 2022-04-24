<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();

$codpedidox=$_SESSION['codpedf'];

 $valorpagx=$_SESSION['valorpag'];

$data_vencx=$_SESSION['data_venc'];

$data_comprax=$_SESSION['data_compra'];


 mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8');

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 7;
$taxa_boleto = 2.95;
$data_venc = $data_vencx; 
$valor_cobrado =  $valorpagx; 
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = '12345678';  // Nosso numero - REGRA: Máximo de 8 caracteres!
$dadosboleto["numero_documento"] = '0123';	// Num do pedido ou nosso numero
$dadosboleto["data_vencimento"] = $data_venc; 
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "Nome do seu Cliente";
$dadosboleto["endereco1"] = "Endereço do seu Cliente";
$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 09000-410";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja  LOJA ROSA - Valor referente ao codigo do pedido $codpedidox";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a compra <br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "LOJA ROSA - http://www.lojarosa.com.br";
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: lojarosa@yahoo.com.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto LOJAROSA - www.boletorosa.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = " ";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - ITAÚ
$dadosboleto["agencia"] = "1565"; // Num da agencia, sem digito
$dadosboleto["conta"] = "13877";	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "4"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - ITAÚ
$dadosboleto["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

// SEUS DADOS
$dadosboleto["identificacao"] = "LOJA ROSA";
$dadosboleto["cpf_cnpj"] = "123.456.789-32";
$dadosboleto["endereco"] = " Avenida dos reis 56";
$dadosboleto["cidade_uf"] = "São Bernardo do Campo/SP";
$dadosboleto["cedente"] = "LOJA ROSA";


include("funcoes_itau.php"); 
include("layout_itau.php");
?>
