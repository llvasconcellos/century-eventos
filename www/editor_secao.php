<?
class editorHTML{
	function editorHTML($largura, $altura, $css, $codigo, $formulario){
		echo('<script language="javascript" src="../scripts/language/portugues/editor_lang.js"></script>' . "\n");
		if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE")) echo "<script language=JavaScript src='/century/scripts/editor.js'></script>";
		else echo "<script language=JavaScript src='/century/scripts/moz/editor.js'></script>";
		
		if($codigo == 0) $text = "";
		else{
			require("../conectar_mysql.php");
			$query = "SELECT * FROM secoes where cd=" . $codigo;
			$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error() . $query);
			$text = mysql_fetch_array($result, MYSQL_ASSOC);
			require("../desconectar_mysql.php");
		}
		
		echo('<pre id="temp_conteudo" name="temp_conteudo" style="display:none">');
		$sContent = stripslashes($conteudo["conteudo"]);
		echo htmlentities($sContent);
		echo('</pre>');
		
		echo('<script>' . chr(10));
		echo('var oEdit1 = new InnovaEditor("oEdit1");' . chr(10));
		echo('oEdit1.css="' . $css . '";' . chr(10));
		echo('oEdit1.width="' . $largura . '";' . chr(10));
		echo('oEdit1.height="' . $altura . '";' . chr(10));
		echo('oEdit1.features=["Search","Cut","Copy","Paste","PasteWord","|","Undo","Redo","|","ForeColor","BackColor","|","Bookmark","Hyperlink","XHTMLSource","Numbering","Bullets","BRK","Indent","Outdent","Image","Flash","Media","Table","Guidelines","Characters","Line","Form","Clean","StyleAndFormatting","TextFormatting","ListFormatting","BoxFormatting","ParagraphFormatting","CssText","Styles","BRK", "Paragraph","FontName","FontSize","Bold","Italic","Underline","|","JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"];' . "\n");
		echo('oEdit1.cmdAssetManager="modalDialogShow(\'/century/assetmanager/assetmanager.php\',640,465)";' . "\n");
		echo('oEdit1.RENDER(document.getElementById("temp_conteudo").innerHTML);' . chr(10));
		echo('function save(){
			document.forms[' . $formulario . '].texto.value = oEdit1.getHTMLBody();
			document.forms[' . $formulario . '].submit();
		}');
		echo('</script>');
	}
}
?>