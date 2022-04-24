<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$nome = $_POST['txtnomecliente'];
$sobrenome = $_POST['txtsobrenomecliente'];
$end1 = $_POST['txtend1cliente'];
$cep1 = $_POST['txtcep1cliente'];
$end2 = $_POST['txtend2cliente'];
$cep2 = $_POST['txtcep2cliente'];
$end3 = $_POST['txtend3cliente'];
$cep3 = $_POST['txtcep3cliente'];
$rg = $_POST['txtrgcliente'];
$cpf= $_POST['txtcpfcliente'];
$email = $_POST['txtemailcliente'];
$senha = $_POST['txtsenhacliente'];
$telefone = $_POST['txtfonecliente'];
echo $nome.$sobrenome.$end1.$cep1.$end2.$cep2.$end3.$cep3.$rg.$cpf;
$connect = mysql_connect('localhost','root','vertrigo');
mysql_query("SET NAMES 'utf8'");  

mysql_query('SET character_set_connection=utf8');  

mysql_query('SET character_set_client=utf8');  

mysql_query('SET character_set_results=utf8'); 

$db = mysql_select_db('tcc');
$comando= "INSERT INTO tb_cliente (nome_cliente,sobrenome_cliente,end1_cliente,cep1_cliente,end2_cliente,cep2_cliente,end3_cliente,cep3_cliente,cpf_cliente,email_cliente,senha_cliente,rg_cliente,fone_cliente) 
		VALUES ('$nome','$sobrenome','$end1','$cep1','$end2','$cep2','$end3','$cep3','$cpf','$email','$senha','$rg','$telefone')";
    $resulta = mysql_query($comando);
   
    if ($resulta!=0) {
        echo "<script> alert('inclusão ok'); window.close();</script>";
		
    }
    else
        echo "<script> alert('erro de inclusão');history.go(-1);</script>";


?>