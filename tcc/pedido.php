<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
echo "<script> history.forward(1);</script>";
$logx=$_SESSION['logado'];
$loginy=$_SESSION['login'];
if ($loginy=="")
{
echo "obrigatório o login";
}
else
{
$codpedf=$_SESSION['codpedf'];
$codcliente=$_SESSION['codcliente'];
echo  "logado  ".$logx;

echo  "     Login: ".$loginy;
echo  "     codpedido : ".$codpedf;
$conn=mysql_connect("localhost", "root","vertrigo") or  die("nao conectado ");
mysql_select_db("tcc"); 
$codx=$_POST["txtcod2"];
$quantx=$_POST["txtquantp"];
$comando= "select * from tb_produto where id_prod=$codx";
$resulta = mysql_query($comando);
$p=0;
while($registro = mysql_fetch_array($resulta))
{
if ($quantx>$registro[12])

{

echo "<script> alert('quantidade insuficiente');</script>";
}

else
{
 echo "<form name=focompra action=insere.php method=post>"; 
 echo "<input name=txtcod2 id=codx  type=hidden value=$codx>";
	echo " Codigo "; echo $registro[0]."<br>";
	echo "Nome    "; echo $registro[1]."<br>"; 
	echo "Marca   "; echo $registro[3]."<br>";
    echo "Descrição  "; echo $registro[2]."<br>"; 
	echo "Valor R$:  "; echo $registro[4]."<br>";
	
	$imagem_dir = $registro[12];
	
	  $imagem_dir = "arquivos/" .$registro[12];
    echo "foto    "; echo "<img src='$imagem_dir'  width=200 heigth=200>"; 
	
    $total=$quantx*$registro[5];
     echo " Quantidade Pedida :".$quantx." <br>" ;
      echo " Valor Total R$:".$total."<br>" ;
      echo "<input name=txttotal id=tot  type=hidden value=$total>";

      echo "<input name=txtquantp id=quant  type=hidden value=$quantx>";
      echo "<input name=botao id=btn2 type=submit value=confirma_Pedido>" ;
  echo "</form>";
}
}
echo "</table>";
$close = mysql_close($conn);
}
?>