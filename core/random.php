<?PHP
use Medoo\Medoo;
$data = $database->get("sujet", "url", [
'ORDER' => Medoo::raw('RAND()')
]
 );
statsAddRnd($database);
 header("Location: " . $conf['url'] .$data);
 
 
 
?>