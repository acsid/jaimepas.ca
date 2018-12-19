<?PHP
// J'aime Pas Ca version 0.2.2
// ---------------------------------
// un endroit ou tu peut dire que t'aime pas ca
// auteur : Michael Céré (vikingman)

session_start();

include_once('core/api.php');

//hybryd auth
include_once('core/libs/hybridauth/autoload.php');
use Hybridauth\Hybridauth;

$hybridauth = new Hybridauth($HAconfig);
$adapters = $hybridauth->getConnectedAdapters();
$uri =  ltrim($_SERVER["REQUEST_URI"], '/');



$post = '';
if ( @$_POST['post'] ) {
	$post = @$_POST['post'];
	//detection de post existant
	if ($database->has("sujet" , [ "text" => $post	])) {
		//display post
		$post = str_replace(" ","_",$post);
		$posturl = strtr(
    $post, 
    '@ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'aAAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
);

$vote = $database->get("sujet" , ["id","vote"] , [
		"url" => $post
		]);
		$result = $vote['vote'] + 1;
		$database->update("sujet" , [
			"vote" => $result
		],[
			"url" => $post
		]);
		
		
		if(isset($_SESSION['internalid'])) {
			if ( $_SESSION['internalid'] == -1 ) {
				
		} else {
		$database->insert("list", [
			"account" => $_SESSION['internalid'],
			"sujet" => $vote['id']
		]);
		}
		}
		statsAddjaimepas($database);
		$_SESSION[$post] = true;
		header("Location: " . $conf['url'] .$posturl);
	}
	//si post non existant le creer
	else {
		$post = @$_POST['post'];
		if($post != strip_tags($post)) {
			header("Location: " . $conf['url'] ."le_xss");
		} else {
		
		$posttext = $post;
		$post		= str_replace(" ","_",$post);
		$posturl = strtr(
    $post, 
    '@ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'aAAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
);
$posturl = preg_replace('/[^\w]+/', '_', $posturl);
		//inject post
		$database->insert("sujet", [
			"text" => $posttext,
			"vote" => 1,
			"url" => $posturl
		]);
		$sujet = $database->id("sujet");
		//inject in list if logged
	if(isset($_SESSION['internalid'])) {
		$database->insert("list", [
			"account" => $_SESSION['internalid'],
			"sujet" => $sujet
		]);
	}
		$_SESSION[$posturl] = true;
		//display post
		statsAddpost($database);
		header("Location: " . $conf['url'] .$posturl);
	}
	}
	
} else if ( @$_POST['jaimepasca'] ) {
	$post = @$_POST['jaimepasca'];
if (@$_SESSION[$post] == true) {
	header("Location: " . $conf['url'] .$post);
}
else {
	//ajouter un vote
	if ($database->has("sujet" , ["url" => $post])) {
		//display post
		//$post = str_replace(" ","_",$post);
		$vote = $database->get("sujet" , ["id","vote"] , [
		"url" => $post
		]);
		$result = $vote['vote'] + 1;
		$database->update("sujet" , [
			"vote" => $result
		],[
			"url" => $post
		]);
		
		
		if(isset($_SESSION['internalid'])) {
			if ( $_SESSION['internalid'] == -1 ) {
				
		} else {
		$database->insert("list", [
			"account" => $_SESSION['internalid'],
			"sujet" => $vote['id']
		]);
		}
		}
		statsAddjaimepas($database);
		$_SESSION[$post] = true;
		header("Location: " . $conf['url'] .$post);
	}
}
	
}
 else {
	 ob_start();
	 
$uri =  ltrim($_SERVER["REQUEST_URI"], '/');
$uri = explode("?", $uri);
$uri = $uri[0];
	if ( @$uri == "_login" ) {
		include_once("core/callback.php");
	} 
	elseif ( $uri == "_auth") {
		include_once("core/auth.php");
	}
	elseif ( $uri == "_compte") {
		include_once("core/compte.php");
	}
	elseif ( $uri == "_setname") {
		include_once("core/setname.php");
	}
	elseif ($uri == "_aleatoire") {
		include_once("core/random.php");
	}
	elseif ($uri == "_info") {
		include_once("info.php");
	}
	elseif ($uri == "_liste") {
		include_once("hatelist.php");
	}
	elseif ($uri == "_vie_privee") {
		include_once("privacy.php");
	}
	else if ( $uri == "" ) {
		
		include_once("root.php");
	
	//include_once("last.php");
	//include_once("stats.php");
	
	
	}
	else  {
	$post = @$uri;
	$post = str_replace("_"," ",$post);
	$posturl = strtr(
    $uri, 
    '@ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'aAAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
);
	include_once("display.php");
	} 
 }
$content = ob_get_contents();
ob_end_clean();

ob_start();
include("htmlhead.php");
$htmlHead = ob_get_contents();
ob_end_clean();

ob_start();
include("style.php");
$style = ob_get_contents();
ob_end_clean();
ob_start();
include_once("core/authmenu.php");
$authMenu = ob_get_contents();
ob_end_clean();
ob_start();
include("stats.php");
$footer = ob_get_contents();
ob_end_clean();

$render = str_replace("[-!!pageContent!!-]",$content,$style);
@$render = str_replace("[-!!pageTitle!!-]",$pagetitle,$render);
@$render = str_replace("[-!!footerContent!!-]",$footer,$render);
@$render = str_replace("[-!!htmlHead!!-]",$htmlHead,$render);
print(str_replace(" [-!!authMenu!!-]",$authMenu,$render));

?>