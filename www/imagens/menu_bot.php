<?
$mod = $_GET["mod"];
$txt = $_GET["txt"];
if($mod == "over"){
	$fundo = imagecreatefrompng("bot_over.png");
	$fonte = "ariblk.ttf";
}
else{
	$fundo = imagecreatefrompng("bot_out.png");
	$fonte = "arial.ttf";
}

$white = imagecolorallocate($fundo, 255, 255, 255);
$grey = imagecolorallocate($fundo, 128, 128, 128);

$dim = imagettfbbox(6.5, 0, $fonte, $txt);
$ponto_insercaox = (140/2)-($dim[2]/2);
$ponto_insercaoy = 13;

imagettftext($fundo, 6.5, 0, $ponto_insercaox, $ponto_insercaoy, $white, $fonte, $txt);

imagepng($fundo);
imagedestroy($fundo);
?>