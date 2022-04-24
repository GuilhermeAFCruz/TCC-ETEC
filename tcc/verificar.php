<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
$ver=$_POST["bot1"];
$conn=mysql_connect("localhost", "root","vertrigo") or  die("nao conectado ");
mysql_select_db("tcc"); 
if ($ver=="INCLUIR")
{

    $nomeprodx=$_POST["txtnomeprod"];
    $descx=$_POST["txtdesc"];
    $valorx=$_POST["txtvalor"];
	$valorcompx=$_POST["txtvalorcomp"];
    $statusx=$_POST["txtstatus"];
    $codcatx= $_POST['txtcodcat'];
	$tamanhox= $_POST['txttamanho'];
	$idfornx= $_POST['txtidforn'];
	$matfuncx= $_POST['txtmatfunc'];
	$quantprodx= $_POST['txtquantprod'];
	$fotox= $_SESSION['nomefoto'];
    $comando= "Insert into tb_produto(nome_prod,desc_prod,valor_prod,valor_comp_prod,status_prod,cod_cat,tamanho_prod,id_forn,mat_func	,qtd_prod,foto_prod) values ( '$nomeprodx','$descx',$valorx,$valorcompx,'$statusx',$codcatx,'$tamanhox',$idfornx,$matfuncx,$quantprodx,'$fotox')";
    $resulta = mysql_query($comando);
   
    if ($resulta!=0) {
        echo "<script> alert('inclusão ok'); history.go(-1);</script>";
    }
    else
        echo "<script> alert('erro de inclusão');history.go(-1);</script>";

    
}
else
if ($ver=="DELETAR")
{
$codx=$_POST["txtcod"];

$comando= "delete from tb_produto where id_prod=$codx";

$resulta = mysql_query($comando);                                           

if ($resulta!=0) {
    echo "<script> alert('deleção ok');</script>";
     
}
else
    echo "<script> alert('erro de deleção');</script>";
}

else

if ($ver=="LISTAR")
{

$comando= "select * from tb_produto";
$resulta = mysql_query($comando);

$p=0;
echo "<table border=1 cellspacing=0 align=center>";
echo "<tr bgcolor=#006699 style=color:white>";
echo "	<td> id prod </td>";
echo"	<td> nome do produto </td>";
echo"	<td> descrição </td>";
echo"	<td> valor prod </td>";
echo "	<td> valor compra </td>";
echo "	<td> Status </td>";
echo "	<td> Cod Cat </td>";
echo "	<td> Tamanho </td>";
echo "	<td> Cod Barra </td>";
echo "	<td> Fornecedor </td>";
echo "	<td> Mat. Func. </td>";
echo "	<td> Qtd. Produto </td>";
echo "	<td> Foto Produto </td>";

echo "</tr>";

while ($registro = mysql_fetch_array($resulta))
{
	echo "<tr>";
	echo "<td>"; echo $registro[0]; echo "</td>";
	echo "<td>"; echo $registro[1]; echo "</td>";
	echo "<td>"; echo $registro[2];echo "</td>"; 
    echo "<td>"; echo $registro[3];echo "</td>"; 
	echo "<td>"; echo $registro[4];echo "</td>";
	echo "<td>"; echo $registro[5];echo "</td>";
	echo "<td>"; echo $registro[6];echo "</td>";
	echo "<td>"; echo $registro[7];echo "</td>";
	echo "<td>"; echo $registro[8];echo "</td>";
	echo "<td>"; echo $registro[9];echo "</td>";
	echo "<td>"; echo $registro[10];echo "</td>";
	echo "<td>"; echo $registro[11];echo "</td>";
	echo "<td>"; echo $registro[12];echo "</td>";
    echo "</tr>";
}

echo "</table>";
}

$close = mysql_close($conn);
?>