<?php
if(!isset($_GET['q'])) {
	$_GET['q'] = "explore";
}
if(substr_count($_GET['q'], "http://playfic.com") == 0) {
	$_GET['q'] = "http://playfic.com/".$_GET['q'];
}
$page = file_get_contents($_GET['q']);

if(substr_count($_GET['q'], "games/")){
	//we are in a game, grab the iframe contents as the page

	$parts = explode("<iframe", $page);
	$parts = $rest = $parts[1];
	$parts = explode('src="', $parts);
	$parts = $parts[1];
	$parts = explode('"', $parts);
	$src = $parts[0];
	$page = file_get_contents("http://playfic.com/".$src);
	//$page = str_replace(' href="', ' href="http://playfic.com/', $page);
	$page = str_replace("default_story: '", "default_story: 'http://playfic.com", $page);
	$page = str_replace(' src="', ' src="http://playfic.com/parchment/', $page);
} else {
	$page = str_replace(' src="', ' src="http://playfic.com/', $page);
}
echo $page;