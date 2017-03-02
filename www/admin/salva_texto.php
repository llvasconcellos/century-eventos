<?
	
	$nome = $_POST["nome"];
	$conteudo = $_POST["texto"];
	
	$conteudo=stripslashes($conteudo);//remove slashes (/)	
	$conteudo=ereg_replace("'","''",$conteudo);//fix SQL

	$query = "UPDATE textos SET ";
	$query .= "conteudo='" . $conteudo ."'";
	$query .= " WHERE nome='" . $nome . "'";
	
	require("../conectar_mysql.php");
		$result = mysql_query($query) or die("Erro ao atualizar registros no Banco de dados: " . mysql_error());
	require("../desconectar_mysql.php");
	?>
<html>
<script language="javascript" type="text/javascript">
	self.close();
	opener.location = opener.location;
</script>
</html>