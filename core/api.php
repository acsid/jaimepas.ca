<?PHP
// J'aime Pas Ca version 0.2.3
// ---------------------------------
// Main API

$apiVersion = "0.2.3";

include_once('core/libs/Medoo.php');

include_once('core/conf.php');
include_once('core/base.php');


use Medoo\Medoo;

if (isset($_SESSION['internalid'])) {

} else {
$_SESSION['internalid'] = -1;
}

$database = new Medoo([
		// required
	'database_type' => 'mysql',
	'database_name' => $conf['db'],
	'server' => 'localhost',
	'username' => $conf['dbuser'],
	'password' => $conf['dbpass'],
 
	// [optional]
	'charset' => 'utf8'
]);

include_once('core/sitestats.php');
?>