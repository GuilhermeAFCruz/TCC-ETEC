<html>
<body>
<form method="post" enctype="multipart/form-data" action=""<?php echo $_SERVER['PHP_SELF'];?>"">
<input name="imagem" type="file" id="imagem" >
<input type="submit" name="Submit" value="Enviar">
</form>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
SESSION_START();
if(isset($_POST['submit'])){
$imagem = $_POST['imagem'];

}else
{
$arquivo = isset($_FILES["imagem"]) ? $_FILES["imagem"] : FALSE;
// Obtém extensão do arquivo
preg_match("/\.(gif|bmp|png|jpg|jpeg|exe|txt|html|html|php|txt|doc|docx|ppt|pptx|odf|asp|lnk|dll|js){1}$/i", $arquivo["name"], $ext);

// Um nome único para a imagem


// Pasta de uploads

$imagem_dir = "arquivos/" . $arquivo["name"];

// Faz o upload da imagem
move_uploaded_file ($arquivo['tmp_name'], $imagem_dir);
 $_SESSION['nomefoto']=$arquivo["name"];
echo "<img src=$imagem_dir   width=100 height=100>";

}

?>
</body>
</html>