<?php
require("permissao_documento.php");
include("../funcoes.php");

if (strlen($_POST["modo"]) != 0){
	if ($_POST["modo"] == "novasecao"){
		if (strlen($_POST["secao"]) != 0){
			require("../conectar_mysql.php");
			$query = "INSERT INTO nomedesecao (nome) VALUES ('" . $_POST["secao"] . "')";
			$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
			require("../desconectar_mysql.php");
		}
	}
	elseif ($_POST["modo"] == "mudanomesecao"){
		if (strlen($_POST["nomedesecao"]) != 0){
			if($_POST["pgseparadas"] == true) $pgseparadas = "s";
			else $pgseparadas = "n";
			require("../conectar_mysql.php");
			$query = "UPDATE nomedesecao SET nome='" . $_POST["nomedesecao"] . "', pgseparadas='" . $pgseparadas . "' WHERE cd=" . $_POST["cd"];
			$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
			require("../desconectar_mysql.php");
		}
	}
}
admin("inicia_pg();");
?>


<script language="javascript" type="text/javascript">
	function apagar(codigo){
		if (window.showModalDialog('confirmacao.html',['Confirme!','Deseja apagar este texto?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
			void window.open('delete.php?oque=secoes&cd=' + codigo, 'CONFIG', 'width=100,height=50,toolbar=no,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
		}
	}
	function apagar_secao(codigo){
		if (window.showModalDialog('confirmacao.html',['Confirme!','Deseja apagar esta seção e todos os seus textos?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
			void window.open('delete.php?oque=nomedesecao&cd=' + codigo, 'CONFIG', 'width=100,height=50,toolbar=no,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
		}
	}
	function edita_texto(secao, codigo, update){
		var complemento = "";
		if (update) complemento = "&modo=update";
		window.open('wizard_novo_texto_secao.php?secao=' + secao + '&cd=' + codigo + complemento, 'TEXTO', 'width=580,height=500,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
	}
</script>
<table width="100%" class="conteudo">
	<tr>
		<td>
			<table width="80%">
				<form action="secoes.php" name="novasecao" method="post">
				<tr>
					<td class="menurodape">Nova Seção</td>
					<td width="50%"><input type="text" name="secao" style="width: 100%;"></td>
					<td><input type="submit" value="OK"></td>
				</tr>
				<input type="hidden" name="modo" value="novasecao">
				</form>
			</table>
			<hr>
		</td>
	</tr>
	<tr>
		<td>
			<?
			require("../conectar_mysql.php");
			$query = "SELECT * FROM nomedesecao ORDER BY nome";
			$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
			while($nomedesecao = mysql_fetch_assoc($result)){ 
				if ($nomedesecao["pgseparadas"] == "s") $checked = " checked";
				else $checked = "";
			?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<form action="secoes.php" method="post">
						<td height="30" valign="bottom" width="35"><a href="javascript: mostra_conteudo_<?=$nomedesecao["cd"]?>();"><img border="0" src="../imagens/pastadocumento.gif"></a></td>
						<td align="left" valign="middle" class="menurodape"><input type="text" name="nomedesecao" value="<?=$nomedesecao["nome"]?>" style="width: 116px; font-family:'Lucida Sans Unicode', Verdana, Arial; font-weight: bold;">&nbsp;&nbsp;<input type="checkbox" name="pgseparadas"<?=$checked?>>&nbsp;Paginas Separadas&nbsp;&nbsp;<input type="submit" value="OK">&nbsp;&nbsp;<a href="javascript: apagar_secao(<?=$nomedesecao["cd"]?>);"><img border="0" src="../imagens/button_drop.png"></a></td>
						<input type="hidden" name="cd" value="<?=$nomedesecao["cd"]?>">
						<input type="hidden" name="modo" value="mudanomesecao">
						</form>
					</tr>
					<tr>
						<td colspan="2">
						<script language="javascript" type="text/javascript">
							function mostra_conteudo_<?=$nomedesecao["cd"]?>(){
								if (document.all['<?=str_replace(" ", "", $nomedesecao["nome"]) . $nomedesecao["cd"]?>'].innerHTML == ""){
									document.all['<?=str_replace(" ", "", $nomedesecao["nome"]) . $nomedesecao["cd"]?>'].innerHTML = <?=str_replace(" ", "", $nomedesecao["nome"])?>;
								}
								else document.all['<?=str_replace(" ", "", $nomedesecao["nome"]) . $nomedesecao["cd"]?>'].innerHTML = "";
							}
							var <?=str_replace(" ", "", $nomedesecao["nome"])?> = '<table cellpadding="0" cellspacing="0"><?
							$query = "SELECT * FROM secoes WHERE nomedesecao = " . $nomedesecao["cd"] . " ORDER BY titulo";
							$result2 = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
							while($secao = mysql_fetch_assoc($result2)){
								echo('<tr><td width="10">&nbsp;</td><td width="50"><img src="../imagens/arquivo.gif"></td><td class="celula"><a href="javascript: edita_texto(' . $nomedesecao["cd"] . ', ' . $secao["cd"] . ', true)">' . $secao["titulo"] . '&nbsp;&nbsp;<a href="javascript: apagar(' . $secao["cd"] . ');"><img border="0" src="../imagens/button_drop.png"></a></tr>');
							}
							?><tr><td>&nbsp;</td><td><img src="../imagens/arquivo2.gif"></td><td><input type="button" value="Novo Texto da Seção" onClick="Javascript: edita_texto(<?=$nomedesecao["cd"]?>, 0, false);"></td></tr></table>';
						</script>
						<div id="<?=str_replace(" ", "", $nomedesecao["nome"]) . $nomedesecao["cd"]?>"></div>
						</td>
					</tr>
				</table>
				<br><br>
				<?
			}
			require("../conectar_mysql.php");
			?>
		</td>
	</tr>
</table>

<?
admin("termina_pg();");
?>