<?php
require("../funcoes.php");
require("permissao_documento.php");

admin("inicia_pg();");
?>
<div style="font-family: Arial, Helvetica, sans-serif; font-size:12px; color:#000000; background-color:#FFFFFF; text-align:left;">
	Alterar Senha Administrador<br>
	Nova Senha:&nbsp;<input type="password" id="senha"><br>Confirmação:<input type="password" id="confirma">&nbsp;&nbsp;<input type="button" onClick="if((document.all['senha'].value == document.all['confirma'].value) && (document.all['senha'].value != '')) window.open('salva_config.php?chave=senha&valor=' + document.all['senha'].value, 'CONFIG', 'width=100,height=50,toolbar=no,status=no,resizable=no,top=20,left=100,dependent=yes,alwaysRaised=yes'); else { alert('A senha não confere!'); document.all['senha'].value = ''; document.all['confirma'].value = ''; }" value="OK">
</div>
<hr>
<?
require("../conectar_mysql.php");
$query = "SELECT conteudo FROM textos WHERE nome='" . $texto . "'";
$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
$texto = mysql_fetch_row($result);
require("../desconectar_mysql.php");
require("../editor.php");
$editor = new editorHTML("454px", "300px", "/century/estilo_editor.css", "home", 0);?>
<hr>
<div class="titulosecao">&nbsp;&nbsp;<img align="absmiddle" src="../imagens/bullet_silver.gif">&nbsp;<a class="menuesquerdo" href="<?=$agenda?>">Agenda</a></div><br>
<? //admin('constroi_destaque_agenda(3, 3);'); ?>
<br>
<hr>
<div class="titulosecao">&nbsp;&nbsp;<img align="absmiddle" src="../imagens/bullet_silver.gif">&nbsp;<a class="menuesquerdo" href="<?=$eventos?>">Eventos</a></div><br>
<? //admin('constroi_destaque_eventos(3, 3);'); ?>
<br>
<? admin("termina_pg();"); ?>