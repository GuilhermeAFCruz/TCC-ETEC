<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
$catx=$_GET['cat'];

$conn=mysql_connect("localhost", "root","vertrigo") or  die("nao conectado ");
// comando que abre o banco de dados
mysql_select_db("TCC"); 
// acentuação dos conteúdos da tabela , ex lápis
mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 

$comando= "select * from tb_produto";

$resulta = mysql_query($comando);
$p=0;


echo "<table border=0 cellspacing=1 align=center>";

echo "<tr>";

$cont=0;

while ($registro = mysql_fetch_array($resulta))
{

    $cont++;
   
    if ($cont>5)
    { 
   
        echo "</tr>";
        echo "<tr>";
        $cont=1;
    }

    echo "<td width=200 heigth=200 align=center>";
	
    echo "<form name=fox action=listarcodcompra.php  method=POST>"; 
    

    $imagem_dir = "arquivos/" .$registro[12];
    echo "<img src=$imagem_dir width=150 heigth=150> <br>" ;
    
    echo "<input name=txtcod id=codx  type=hidden value=$registro[0]>  <br>";
    
    echo "<strong> $registro[1] <br> <br> </strong>" ;
	echo " $registro[2] <br> <br>  ";
	echo"<strong> R$ $registro[4] <br> </strong>";
   
    echo "<input type=image name=botcompra  src='images/botcompra.fw.png' width=100 height=40>"; 
   
    echo "</form>";
    
    echo "</td>";
}

echo "</tr>";

echo "</table>";

$close = mysql_close($conn);



?>