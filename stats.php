<?PHP
use Medoo\Medoo;
$fstats = $database->get("daystats","*",['date' => Medoo::raw('CURDATE()')]);
printf("Stats: %s Choses pas aimer par %s personnes. Aujourd'hui %s Pages %s nouveau post %s nouveau votes et %s personne on cliquer sur al&eacute;atoire",
		$database->count("sujet"),
		$database->sum("sujet","vote"),
		$fstats["pageview"],
		$fstats["newpost"],
		$fstats["newdontlike"],
		$fstats["random"]
		);

?>