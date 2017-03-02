<?php
require("funcoes.php");

$pagina = $_GET["pagina"];
if(strlen($pagina) == 0) $pagina = 1;

inicia_pagina();
constroi_tabela_eventos(12, 3, $pagina);
termina_pagina();


#################################################################################################################

function constroi_tabela_eventos($numerodedestaques, $colunas, $pagina){
	$contador_de_colunas = 0;

	$limite = ($numerodedestaques * ($pagina -1));
	$query_limit = " LIMIT " . $limite . "," . $numerodedestaques;

	if($_GET["busca"] == "data") {
		$data = $_GET["data"];
		$filtro = "AND eventos.data=" . $data;
				$query = "SELECT eventos.cd, eventos.nomes, eventos.data, eventos.imagem_destaque, tipodeevento.tipo FROM eventos, tipodeevento WHERE (eventos.tipo=tipodeevento.cd) " . $filtro . " ORDER BY data DESC" . $query_limit;
	}
	elseif($_GET["busca"] == "chave"){
		$chave = $_REQUEST["chave"];
		$filtro = "AND eventos.nomes LIKE '%" . $chave . "%'";
		$query = "SELECT eventos.cd, eventos.nomes, eventos.data, eventos.imagem_destaque, tipodeevento.tipo FROM eventos, tipodeevento WHERE (eventos.tipo=tipodeevento.cd) " . $filtro . " ORDER BY data DESC" . $query_limit;
	}
	else $query = "SELECT eventos.cd, eventos.nomes, eventos.data, eventos.imagem_destaque, tipodeevento.tipo FROM eventos, tipodeevento WHERE (eventos.tipo=tipodeevento.cd) AND (eventos.data < " . mktime() . ") AND (eventos.status = 0) " . $filtro . " ORDER BY data DESC" . $query_limit;

	require("conectar_mysql.php");
	$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error() . $query);
	?>
	<center><strong>Eventos<br></strong></center><hr />
	<?
	if(mysql_num_rows($result) == 0){
		?>
		<table width="100%" cellspacing="5">
			<tr>
				<td align="center" valign="middle">Não foi encontrado nenhum evento.</td>
			</tr>
		</table>
		<?
	}
	else{
		?><table width="100%" cellspacing="5"><tr><?
		if($_GET["busca"] == "data") {
			$data = $_GET["data"];
			$filtro = "WHERE data=" . $data;
		}
		elseif($_GET["busca"] == "chave"){
			$chave = $_REQUEST["chave"];
			$filtro = "WHERE nomes LIKE '%" . $chave . "%'";
		}
		$query = "SELECT COUNT(*) FROM eventos, tipodeevento WHERE (eventos.tipo=tipodeevento.cd) AND (eventos.data < " . mktime() . ") AND (eventos.status = 0) " . $filtro;
		$tmp = mysql_fetch_row(mysql_query($query));
		$eof = $tmp[0];

		while($evento = mysql_fetch_array($result, MYSQL_ASSOC)){
			$query = "SELECT path_thumb FROM fotos WHERE cd=" . $evento["imagem_destaque"];
			$result2 = mysql_query($query);
			$imagem = mysql_fetch_row($result2);
			?>
			<td width="33%" align="center" valign="top">
				<table width="100%" height="130" border="0">
					<tr>
						<td align="center" valign="top" height="50%"><a href="ver_evento.php?cd=<?=$evento["cd"]?>"><img border="0" src="<?=$imagem[0]?>"></a></td>
					</tr>
					<tr>
						<td class="menu" height="12" style="text-align: center; font-size:11px;">[<?=date("d/m/Y", $evento["data"])?>] <?=$evento["tipo"]?> de <b><?=$evento["nomes"]?></b></td>
					</tr>
				</table>
				<br /><br />
			</td>
			<?
			$contador_de_colunas++;
			if($contador_de_colunas >= $colunas){
				echo("</tr><tr>");
				$contador_de_colunas = 0;
			}
		}
		?></tr>
		<tr>
			<td align="left">
				<?
				if($_GET["busca"] == "data") $busca = "&busca=data&data=" . $data;
				if($_GET["busca"] == "chave") $busca = "&busca=chave&chave=" . $_REQUEST["chave"];
				else $busca="";
				if($pagina != 1) echo('<a href="eventos.php?pagina=' . ($pagina-1) . $busca . '"><img border="0" src="imagens/voltar.gif"></a>'); ?>
			</td>
			<td></td>
			<td align="right">
				<? if($limite + $numerodedestaques < $eof) echo('<a href="eventos.php?pagina=' . ($pagina+1) . $busca . '"><img border="0" src="imagens/avancar.gif"></a>'); ?>
			</td>
		</tr>
		</table><?
	}
	require("desconectar_mysql.php");
}
?>