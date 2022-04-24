<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
  $usuario = $_POST['txtusuario'];
  $senha = ($_POST['txtsenha']);
  $connect = mysql_connect('localhost','root','vertrigo');
  $db = mysql_select_db('tcc');
    if (isset($entrar)) {
            
      $verifica = mysql_query("SELECT * FROM tb_cliente WHERE usuario_cliente = '$login' AND senha_cliente = '$senha'") or die("erro ao selecionar");
        if (mysql_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
          die();
        }else{
          ;
        }
    }
?>