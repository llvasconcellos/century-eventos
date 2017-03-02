<?
function inicia_pg(){
session_start();
$fotos = array("imagens/foto_1.jpg", "imagens/foto_2.jpg", "imagens/foto_3.jpg", "imagens/foto_4.jpg", "imagens/foto_5.jpg", "imagens/foto_6.jpg", "imagens/foto_7.jpg", "imagens/foto_8.jpg", "imagens/foto_9.jpg");
if(is_null($_SESSION["fotos"])) $_SESSION["fotos"] = 0;

$foto = $fotos[$_SESSION["fotos"]];

$_SESSION["fotos"]++;

if($_SESSION["fotos"] == 9) $_SESSION["fotos"] = 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Century Foto e Video</title>
		<link href="estilo.css" type="text/css" rel="stylesheet" rev="stylesheet" />
		<script language="javascript">
			var audio = new Audio('clic.wav');
			
			function toca_som(){
				audio.play();
			}
			function troca_fundo(imagem){
				document.getElementById('foto').style.backgroundImage = imagem;			
			}
		</script>
	</head>
	
	<body>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center" valign="top">
					<table width="766" cellpadding="0" cellspacing="0">
						<tr>
							<td width="100%" valign="top">
								<table width="100%" cellpadding="0" cellspacing="0" border="0" id="foto" style="background-image:url(<?=$foto?>);">
									<tr>
										<td colspan="4" background="imagens/cabecalho.gif" height="119">&nbsp;</td>
									</tr>
									<tr>
										<td align="center" colspan="2" background="imagens/logo.gif" height="149">
											<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="140" Height ="81">
												<param name=movie value="imagens/logo.swf">
												<param name=quality value=high>
												<PARAM NAME=menu VALUE=false>
												<embed src="imagens/logo.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="140" Height ="81"></embed>
											</object>
										</td>
										<td>&nbsp;</td>
										<td width="54" background="imagens/lateral2_fotos.gif">&nbsp;</td>
									</tr>
									<tr>
										<td width="57" background="imagens/lateral_fotos.gif" height="113" rowspan="2">&nbsp;</td>
										<td width="202" align="left" rowspan="2">
											<table width="75%" border="0">
												<tr>
													<td><a href="index.php?foto=imagens/foto_1.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb1.gif" /></a></td>
													<td><a href="index.php?foto=imagens/foto_2.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb2.gif" /></a></td>
													<td><a href="index.php?foto=imagens/foto_3.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb3.gif" /></a></td>
												</tr>
												<tr>
													<td><a href="index.php?foto=imagens/foto_4.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb4.gif" /></a></td>
													<td><a href="index.php?foto=imagens/foto_5.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb5.gif" /></a></td>
													<td><a href="index.php?foto=imagens/foto_6.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb6.gif" /></a></td>
												</tr>
												<tr>
													<td><a href="index.php?foto=imagens/foto_7.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb7.gif" /></a></td>
													<td><a href="index.php?foto=imagens/foto_8.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb8.gif" /></a></td>
													<td><a href="index.php?foto=imagens/foto_9.jpg"><img onmouseover="this.style.filter = 'Invert'; toca_som();" onmouseout="this.style.filter = '';" border="0" src="imagens/thumb9.gif" /></a></td>
												</tr>
											</table>
										</td>
										<td rowspan="2">&nbsp;</td>
										<td height="41" background="imagens/lateral2_fotos.gif">&nbsp;</td>
									</tr>
									<tr height="72">
										<td background="imagens/nao_sei.gif" height="72">&nbsp;</td>
									</tr>
									<tr height="3">
										<td colspan="4" background="imagens/rodape_fotos2.gif"></td>
									</tr>
									<tr>
										<td colspan="2" background="imagens/fundo_menu2.gif" height="100" align="center" valign="top">
											<? constroi_menu(); ?>
										</td>
										<td bgcolor="#202020" valign="top">
<?
}
///////////////////////////////////////////////////////////////////////////////////////////////////

function termina_pg(){
	?>
		</td>
										<td background="imagens/lateral3_fotos.gif">&nbsp;</td>
									</tr>
									<tr>
										<td colspan="4" background="imagens/rodape2.gif" height="94">
											<div style="text-align:right;"><br /><br /><span style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#CCCCCC; margin-right:100px;">&bull; Century&copy; Foto e Video &bull; Desenvolvido por <a style="color: red" target="_blank" href="http://www.devhouse.com.br">DevHouse</a></span></div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<EMBED id="clic" name="clic" src="clic.wav" style="display:none;"></EMBED>
	</body>
</html>
	<?
}
///////////////////////////////////////////////////////////////////////////////////////////////////
function constroi_menu(){
	?>
	<script language="javascript">
	function menu_over(menu, txt){
		menu.src = 'imagens/menu_bot.php?txt=' + txt + '&mod=over';
	}
	function menu_out(menu, txt){
		menu.src = 'imagens/menu_bot.php?txt=' + txt + '&mod=out';
	}
	</script>
	<table border="0" background="imagens/fundo_menu3.gif" width="167">
		<tr>
			<td align="center"><a href="home.php"><img border="0" src="imagens/menu_bot.php?txt=HOME" onmouseover="menu_over(this, 'HOME'); toca_som();" onmouseout="menu_out(this, 'HOME');"></a></td>
		</tr>
		<tr><td align="center"><a href="#"><img border="0" src="imagens/menu_bot.php?txt=AGENDA" onmouseover="menu_over(this, 'AGENDA'); toca_som();" onmouseout="menu_out(this, 'AGENDA');"></a></td></tr>
		<tr><td align="center"><a href="#"><img border="0" src="imagens/menu_bot.php?txt=EVENTOS" onmouseover="menu_over(this, 'EVENTOS'); toca_som();" onmouseout="menu_out(this, 'EVENTOS');"></a></td></tr>
		<tr>
			<td align="center"><a href="contato.php"><img border="0" src="imagens/menu_bot.php?txt=CONTATO" onmouseover="menu_over(this, 'CONTATO'); toca_som();" onmouseout="menu_out(this, 'CONTATO');"></a></td>
		</tr>
	</table>
	<table border="0" background="imagens/rodape_menu2.gif" width="167" height="35">
		<tr>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
	<?
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function admin($funcao){
	ob_start();
	eval($funcao);
	$html = ob_get_contents();
	ob_clean();
	$html = str_replace("estilo.css", "../estilo.css", $html);
	$html = str_replace("imagens/", "../imagens/", $html);
	$html = str_replace("img/", "../img/", $html);
	$html = str_replace("fotos/", "../fotos/", $html);
	$html = str_replace('<tr><td align="center"><a href="agenda.php"><img border="0" src="../imagens/menu_bot.php?txt=AGENDA" onmouseover="menu_over(this, \'AGENDA\'); toca_som();" onmouseout="menu_out(this, \'AGENDA\');"></a></td></tr>', "", $html);
	$html = str_replace('<tr><td align="center"><a href="eventos.php"><img border="0" src="../imagens/menu_bot.php?txt=EVENTOS" onmouseover="menu_over(this, \'EVENTOS\'); toca_som();" onmouseout="menu_out(this, \'EVENTOS\');"></a></td></tr>', '<tr><td align="center"><a href="eventos.php"><img border="0" src="../imagens/menu_bot.php?txt=AGENDA E EVENTOS" onmouseover="menu_over(this, \'AGENDA E EVENTOS\'); toca_som();" onmouseout="menu_out(this, \'AGENDA E EVENTOS\');"></a></td></tr><tr><td align="center"><a href="secoes.php"><img border="0" src="../imagens/menu_bot.php?txt=GERENCIAR SEÇÕES" onmouseover="menu_over(this, \'GERENCIAR SEÇÕES\'); toca_som();" onmouseout="menu_out(this, \'GERENCIAR SEÇÕES\');"></a></td></tr>', $html);
	echo($html);
	flush();
}

###############################################################################################################

function altera_valor($chave, $valor){
	require("conectar_mysql.php");
	$query = "UPDATE config SET valor='" . $valor . "' WHERE chave='" . $chave . "'";
	$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
	require("desconectar_mysql.php");
}
function retorna_config($chave){
	require("conectar_mysql.php");
	$query = "SELECT valor FROM config WHERE chave='" . $chave . "'";
	$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
	$valor = mysql_fetch_assoc($result);
	return $valor["valor"];
	require("desconectar_mysql.php");
}
#################################################################################################################
?>