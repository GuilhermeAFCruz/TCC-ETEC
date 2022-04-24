<?php
// sessão
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
echo "<script> history.forward(1);</script>";
$loga=$_SESSION['logado'];
$loginy=$_SESSION['login'];
$codpedf=$_SESSION['codpedf'];
$codcliente=$_SESSION['codcliente'];
echo "  logado ".$loga;
echo "  Login ".$loginy;
echo "  Pedido  :".$codpedf;
$conn=mysql_connect("localhost", "root","vertrigo") or  die("nao conectado ");
mysql_select_db("tcc"); 
$comando= "select * from tb_item_venda where id_cliente=$codcliente and id_venda=$codpedf";
$resulta = mysql_query($comando);
$p=0;
echo "<table border=1 cellspacing=0 align=center>";
echo "<tr bgcolor=#006699 style=color:white>";
echo "	<td> Codigo do Pedido </td>";
echo"	<td> Codcliente </td>";
echo"	<td> Codigo Produto </td>";
echo"	<td> Quantidade </td>";
echo"	<td> Preço </td>";
echo "</tr>";
while ($registro = mysql_fetch_array($resulta))
{
	echo "<tr>";
echo "<form name=fox action=deletacodcompra.php  method=POST>"; 
             	echo "<td>"; echo $registro[0]; echo "<input name=txtcod id=codx  type=hidden value=$registro[0] ></td>";
	echo "<td>"; echo $registro[1]; echo "</td>";
	echo "<td>"; echo $registro[2];echo "</td>"; 
    echo "<td>"; echo $registro[3];echo "</td>"; 
    echo "<td>"; echo $registro[4];echo "</td>"; 
echo "</form>";
    echo "</tr>";


}

echo "</table>";

$comando2= "select  sum(valor_venda) as tot from tb_item_venda where id_cliente=$codcliente and id_venda=$codpedf";
$resulta2 = mysql_query($comando2);
while ($registro2 = mysql_fetch_array($resulta2))
{
echo "  <br><br>                                                                                  total da Compra : R$".$registro2 [0];
}
$close = mysql_close($conn);ol;

echo "<form name=foins action=verificarfim.php method=post>";
 
    echo "<input name=botaof id=btn2 type=submit value=finaliza_Pedido>" ;
echo "<input name=botaof id=btn3 type=submit value=Continuar_Pedido>" ;
echo "</form>";