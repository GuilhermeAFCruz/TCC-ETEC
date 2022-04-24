<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
echo "<script> history.forward(1);</script>";
$conn=mysql_connect("localhost", "root","vertrigo") or  die("nao conectado ");
mysql_select_db("tcc"); 
$codx=$_POST["txtcod2"];
$quantx=$_POST["txtquantp"];
$totalx=$_POST["txttotal"];
$loginy=$_SESSION['login'];
$codpedy=$_SESSION['codpedf'];
$codcliente= $_SESSION['id_cliente'];
echo $codcliente;
//procura o codpedido
if ($codpedy==0)
{
$comando3="Insert into tb_pedido_venda(dta_venda,id_cliente,status_venda,end_venda,valor_venda) values ('00/00/0000',$codcliente,'ativo','rua X',$totalx)";
$resulta3 = mysql_query($comando3);
$comando3="select  max(id_venda) as codpedidoat  from tb_pedido_venda where id_cliente=$codcliente";
$resulta3 = mysql_query($comando3);
while ($registro3= mysql_fetch_array($resulta3))
{
$codpedy=$registro3[0];

}}
if ($codcliente!=0)
{

 $comando= "Insert into tb_item_venda(id_venda,id_prod,id_cliente,qtd_venda,valor_venda) values ($codpedy,$codx,$codcliente,$quantx,$totalx)";
$resulta = mysql_query($comando);

if ($resulta!=0) {
    echo "<script> alert('inclusão ok');</script>";


$close = mysql_close($conn);
$_SESSION['codpedf']=$codpedy;
$_SESSION['logado']=$loga;
$_SESSION['login']=$loginy;
$_SESSION['codcliente']=$codcliente;
include "vercarrinho.php";
}
else
  {  echo "<script> alert('erro de inclusão');</script>";}

}
else
{echo "<script> alert('Voce não esta logado');</script>";

}


?>
