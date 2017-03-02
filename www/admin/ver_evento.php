<?php
require("permissao_documento.php");
include("../funcoes.php");
$cd_evento = $_GET["cd"];
admin("inicia_pagina();");
?>
<script language="javascript" type="text/javascript">
	function apagar_evento(codigo){
		if (window.showModalDialog('confirmacao.html',['Confirme!','Deseja apagar este evento e todas as suas fotografias?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
			void window.open('delete.php?oque=eventos&cd=' + codigo, 'CONFIG', 'width=100,height=50,toolbar=no,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
		}
	}
	function caixa(){
		if(window.confirm("Deseja adicionar todas as fotos na caixa de entrada neste evento?")) window.open("caixa.php?evento=<?=$cd_evento?>");
	}
</script>
<? constroi_fotos_evento($cd_evento, 4); ?>
<a href="javascript: void window.open('wizard_novo_evento.php?modo=altera_destaque&passo=1&codigo_evento=<?=$cd_evento?>', 'EVENTO', 'width=420,height=160,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');">[Foto de Destaque]</a>&nbsp;&nbsp;
<a href="javascript: void window.open('wizard_novo_evento.php?modo=adiciona_imagem&passo=3&codigo_evento=<?=$cd_evento?>', 'EVENTO', 'width=420,height=160,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');">[Adicionar Foto]</a>&nbsp;&nbsp;
<!--<a href="javascript: void window.open('wizard_novo_evento.php?modo=edita_parceiro&passo=4&codigo_evento=<?=$cd_evento?>', 'EVENTO', 'width=420,height=400,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');">[Editar Parceiros]</a>&nbsp;&nbsp;-->
<a href="javascript: caixa();">[Caixa de Entrada]</a>&nbsp;&nbsp;
<a href="javascript: apagar_evento(<?=$cd_evento?>);">[Apagar Evento]</a>
<? //constroi_ficha_tecnica($cd_evento); ?>
<hr>
<iframe allowtransparency="yes" width="100%" height="500" src="wizard_novo_evento.php?modo=update&codigo_evento=<?=$cd_evento?>"></iframe>
<? admin("termina_pagina();"); 
#################################################################################################################

function constroi_fotos_evento($codigo_evento, $colunas){
	$contador_de_colunas = 0;
		
	require("../conectar_mysql.php");
	$query = "SELECT * FROM eventos, tipodeevento WHERE eventos.tipo=tipodeevento.cd AND eventos.cd=" . $codigo_evento;
	$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
	$evento = mysql_fetch_array($result, MYSQL_ASSOC);
	?>
	<script language="javascript" type="text/javascript">
		function apagar(codigo){
			if (window.showModalDialog('confirmacao.html',['Confirme!','Deseja apagar esta imagem?','Sim','Não'],'dialogWidth:320px;dialogHeight:100px;status:no;') == "1"){
				void window.open('delete.php?oque=fotos&cd=' + codigo, 'CONFIG', 'width=100,height=50,toolbar=no,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes');
			}
		}
	</script>
	<div><?=$evento["descricao"]?></div>
	<?
		if(($evento["status"] == 1) && (strlen($evento["listadecasamento"]) != 0)){
			?>
			<div class="titulosecao">Lista de Presentes:<br><a href="<?=$evento["listadecasamento"]?>"><?=$evento["listadecasamento"]?></a></div><br>
			<?
		}
	?>
	<hr>
	<div class="titulosecao"><img align="bottom" src="../imagens/bullet_silver.gif">&nbsp;Clique na foto para ampliar</div><br>
	<table width="100%" cellspacing="5" cellpadding="0" border="0"><tr>
	<?
	$query = "SELECT cd, path, path_thumb FROM fotos WHERE cd_evento=" . $codigo_evento . " ORDER BY cd";
	$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
	while($foto = mysql_fetch_array($result, MYSQL_ASSOC)){
		?>
		<td align="center" valign="top" class="conteudo">
			<img style="cursor:pointer;" onClick="javascript: void window.open('../<?=$foto["path"]?>', 'Fotografia', 'width=512,height=384,status=no,resizable=yes,top=30,left=100,dependent=yes,alwaysRaised=yes');" src="../<?=$foto["path_thumb"]?>">
			<br><a href="javascript: apagar(<?=$foto["cd"]?>);">[Apagar Foto]</a>
		</td>
		<?
		$contador_de_colunas++;
		if($contador_de_colunas >= $colunas){
			echo("</tr><tr>");
			$contador_de_colunas = 0;
		}
	}
	?></tr></table>
	<?
	require("../desconectar_mysql.php");
}
?>