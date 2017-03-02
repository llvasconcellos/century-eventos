<?php
require("../funcoes.php");
admin("inicia_pg();");
?>
<span class="celula"><B>ADMINISTRAÇÃO DE CONTEÚDO</B></span><BR><BR><BR><BR>
<table width="35%" border="0">
	<form name="login" action="valida_usuario.php" method="post">
	<tr>
		<td width="20%" style="text-align: right; font-family:Arial, Helvetica, sans-serif; font-size:12px;">Senha:</td>
		<td width="60%"><input type="password" name="senha" style="width: 100%;" maxlength="255"></td>
		<td width="10%"><input type="submit" value="OK"></td>
	</tr>
	</form>
</table>
<? if($_GET["status"] == "erro") echo('<div style="color: #FF0000">Senha Errada!</div>'); 
admin("termina_pg();");
?>
