<?php
//basic stats system for now
use Medoo\Medoo;
function checkDay($database) {
	
//check if day exist in database
if($database->has("daystats",[
'date' => Medoo::raw('CURDATE()')
])) {

}
else {
$database->insert("daystats",
[
'date' => Medoo::raw('CURDATE()')
]);

}

return ;
}

checkDay($database);
$uri =  ltrim($_SERVER["REQUEST_URI"], '/');
$uri = explode("?", $uri);
$uri = $uri[0];
//add 1 to page view
if ( $uri == "_aleatoire" ) {
	
} else {
$pageview = $database->get("daystats",[
"pageview"
],
[
'date' => Medoo::raw('CURDATE()')
]);
$pageview = $pageview['pageview'] + 1;

$database->update("daystats",[
"pageview" => $pageview
],[
'date' => Medoo::raw('CURDATE()')
]);

}


function statsAddRnd($database) {
	$pageview = $database->get("daystats",[
"random"
],
[
'date' => Medoo::raw('CURDATE()')
]);
$pageview = $pageview['random'] + 1;

$database->update("daystats",[
"random" => $pageview
],[
'date' => Medoo::raw('CURDATE()')
]);
return ;
}

function statsAddReg($database) {
	$pageview = $database->get("daystats",[
"newreg"
],
[
'date' => Medoo::raw('CURDATE()')
]);
$pageview = $pageview['newreg'] + 1;

$database->update("daystats",[
"newreg" => $pageview
],[
'date' => Medoo::raw('CURDATE()')
]);
return ;
}

function statsAddpost($database) {
	$pageview = $database->get("daystats",[
"newpost"
],
[
'date' => Medoo::raw('CURDATE()')
]);
$pageview = $pageview['newpost'] + 1;

$database->update("daystats",[
"newpost" => $pageview
],[
'date' => Medoo::raw('CURDATE()')
]);
return ;
}

function statsAddjaimepas($database) {
	$pageview = $database->get("daystats",[
"newdontlike"
],
[
'date' => Medoo::raw('CURDATE()')
]);
$pageview = $pageview['newdontlike'] + 1;

$database->update("daystats",[
"newdontlike" => $pageview
],[
'date' => Medoo::raw('CURDATE()')
]);
return ;
}

function statsAddShort($database) {
	
		$pageview = $database->get("daystats",[
"short"
],
[
'date' => Medoo::raw('CURDATE()')
]);
$pageview = $pageview['short'] + 1;

$database->update("daystats",[
"short" => $pageview
],[
'date' => Medoo::raw('CURDATE()')
]);
return ;
}

?>