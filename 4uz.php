<? 
//4uz.net <- url shorter
include_once("core/api.php");

$uri =  ltrim($_SERVER["REQUEST_URI"], '/');
$uri = explode("?", $uri);
$uri = $uri[0];

$match = to10($uri);

$getdata = $database->get("sujet", ["text" ,"vote", "date","url","id"], [
	"id" => $match
]);

if ( !$getdata ) {
header("Location: " . $conf['url']);
}
statsAddShort($database);
header("Location: " . $conf['url'] . $getdata['url']); 
//echo $getdata['url'];
?>