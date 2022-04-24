<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
echo "<script> history.forward(1);</script>";
$loginx=$_POST["txtusuario"];
$senhax=$_POST["txtsenha"];
$conn=mysql_connect("localhost", "root","vertrigo") or  die("nao conectado ");
mysql_select_db("tcc"); 
$comando= "select * from tb_cliente where email_cliente='$loginx' and senha_cliente='$senhax'";
$resulta = mysql_query($comando);
if ($registro = mysql_fetch_array($resulta))
{
$_SESSION['logado']=1;
$_SESSION['login']=$loginx;
$_SESSION['codpedf']=0;
 $_SESSION['id_cliente']=$registro[0];
 $close = mysql_close($conn);
echo"<script>window.location.href='usuariologado.html'</script>"; 
}
    else
     {   echo "<script> alert('E-Mail ou Senha Invalidos'); history.go(-1)</script>";
	 
   $close = mysql_close($conn);}
?>