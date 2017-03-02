<?
require("funcoes.php");
inicia_pg();
if($_GET["modo"] == "enviar") envia_mensagem();
else{
	?>
	<br /><br />
	<div class="titulosecao">&nbsp;Fale Conosco</div><br>
	<table width="80%" class="conteudo">
		<form action="contato.php?modo=enviar" method="post">
		<tr>
			<th align="right" valign="top" width="10%">Nome</td>
			<td><input style="width:100%" type="text" name="nome" class="caixa_texto"></td>
		</tr>
		<tr>
			<th align="right" valign="top">Telefone</td>
			<td><input style="width:100%" type="text" name="telefone" class="caixa_texto"></td>
		</tr>
		<tr>
			<th align="right" valign="top">Email</td>
			<td><input style="width:100%" type="text" name="email" class="caixa_texto"></td>
		</tr>
		<tr>
			<th align="right" valign="top">Mensagem</td>
			<td><textarea style="width:100%" cols="40" rows="15" name="mensagem"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="right" valign="top"><input type="submit" value="enviar"></td>
		</tr>
		</form>
	</table>
	<?
}
termina_pg();


function envia_mensagem(){
	$nome = $_POST["nome"];
	$telefone = $_POST["telefone"];
	$email = $_POST["email"];
	$mensagem = $_POST["mensagem"];
	$destino = retorna_config("email");
	?>
	<div class="titulosecao"><img align="bottom" src="imagens/bullet_silver.gif">&nbsp;Fale Conosco!</div><br>
	<?
	if(mail($destino, "Formulário de Contato - century.com.br", $mensagem . "\n\n\nNome: " . $nome . "\nTelefone: " . $telefone, "From: " . $nome . " <" . $email . ">")){ ?>
		<table width="100%" class="conteudo">
			<tr>
				<td>A mensagem foi enviada com sucesso!</td>
			</tr>
			<tr>
				<td><br><br><br><br><br><a href="contato.php">[Nova Mensagem]</a></td>
			</tr>
		</table>
<?	}
	else{ ?>
		<table width="100%" class="conteudo">
			<tr>
				<td>Problemas no envio da mensagem</td>
			</tr>
			<tr>
				<td><br><br><br><br><br><a href="javascript: history.back();">[Tentar Novamente]</a></td>
			</tr>
		</table>
<?	}
}
?>