<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$conn=mysql_connect("localhost", "root","vertrigo") or  die("nao conectado ");
mysql_select_db("tcc");

mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 


	$busca = $_POST['txtbusca'];
	
		$sql = mysql_query("SELECT * FROM tb_produto WHERE nome_prod LIKE '%".$busca."%' or desc_prod LIKE '%".$busca."%'");
			
			echo "<table border=0 cellspacing=0 align=center>";

echo "<tr>";

$cont=0;
$quant_campos = mysql_num_rows($sql);

if($quant_campos == 0){
echo'<center><strong>Produto não encontrado.</strong></center>';
} else {
				while ($registro = mysql_fetch_array($sql)){
					
					
					
					$cont++;
   
    if ($cont>5)
    { 
   
        echo "</tr>";
        echo "<tr>";
        $cont=1;
    }

    echo "<td  width=200 heigth=200 align=center>";
	
    echo "<form name=fox action=listarcodcompra.php  method=POST>"; 
    

    $imagem_dir = "arquivos/" .$registro[13];
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

					
}
				
				
				
			
		
		
		


?>