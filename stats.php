<?PHP
use Medoo\Medoo;
$fstats = $database->get("daystats","*",['date' => Medoo::raw('CURDATE()')]);
printf("Stats: %s Choses pas aimer par %s personnes. Aujourd'hui %s Pages %s nouveau post %s nouveau votes et %s personne on cliquer sur al&eacute;atoire<br>
		Totaux: %s pages vue %s page al&eacute;atoire en %s jours",
		$database->count("sujet"),
		$database->sum("sujet","vote"),
		$fstats["pageview"],
		$fstats["newpost"],
		$fstats["newdontlike"],
		$fstats["random"],
		$database->sum("daystats","pageview"),
		$database->sum("daystats","random"),
		$database->count("daystats")
		);

?>