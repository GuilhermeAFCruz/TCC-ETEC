<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
echo "<script> history.forward(1);</script>";
$botao=$_POST["botaof"];

if ($botao=="finaliza_Pedido")
{
include "finaliza_Pedido.php";
}
else
if ($botao=="Continuar_Pedido")
{
include "listaremcolunas.php";
}
?>