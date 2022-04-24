<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
$codpedidox=$_SESSION['codpedf'];
$codcliente = $_SESSION['codcliente'];
$conn=mysql_connect("localhost", "root","vertrigo") or  die("nao conectado ");
mysql_select_db("tcc"); 

//soma todos os precos do pedido

$comando2= "select  sum(valor_venda) as tot from tb_item_venda where id_cliente=$codcliente and id_venda=$codpedidox";
$resulta2 = mysql_query($comando2);
while ($registro2 = mysql_fetch_array($resulta2))
{
 $valorpag=$registro2[0];

}


$dias_de_prazo_para_pagamento=7;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400)); 
$data_compra = date("d/m/Y");
echo $codpedidox."   ".$valorpag. "       ".$data_venc. "    ".$data_compra;

//insere os dados na tabela pagamento

$comando3="Insert into pagamento(codpedido,valorpag,datavenc,datacompra) values ($codpedidox,$valorpag,'$data_venc','$data_compra')";
$resulta3 = mysql_query($comando3);

$_SESSION['codpedf']=$codpedidox;

$_SESSION['valorpag']= $valorpag;

$_SESSION['data_venc']=$data_venc;

$_SESSION['data_compra']=$data_compra;

include "boleto_itau.php";

$_SESSION['logado']=0;
$_SESSION['login']="-";
$_SESSION['codcliente']=0;
$_SESSION['codpedf']=0;
$close = mysql_close($conn);

?>