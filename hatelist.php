<?PHP

if ( @$_GET['scroll'] == "next" ) {
	$next = $_GET['start'] + 1;
	
	include_once('core/api.php');
	
	$datas = $database->select("sujet" , ["titre","vote","url"],["ORDER" => ["vote" => "DESC"]]);
	$rank = 1;
	foreach($datas as $data)
{
		$rank++;
		echo $rank . "<a href=\"/".$data["url"]."\">".$data["text"] . "</a> score:" . $data["vote"] . "";
		echo '<form action="index.php" method="post"><input type="hidden" value="'.$data['url'].'" name="jaimepasca" /><input type="submit" name="vote" value=">:("></input></form>';
}
	
	
	echo '
	<a href="https://jaimepas.ca/hatelist.php?scroll=next&start='.$next.'">page suivante</a>
';}	

else {
	
	echo '
	<script src="statics/jquery.jscroll.js"></script>

	<div class="scroll" data-ui="jscroll-default" style="margin-top:150px;">
    <p>Voici la liste des affaires pas aimer des gens</p>';
	$datas = $database->select("sujet" , ["text","vote","date","url"],["ORDER" => ["vote" => "DESC"],]);
	$lastscore = -1;
	$rank = 1;
	foreach($datas as $data)
{
		if ($lastscore == -1) {
				$lastscore = $data["vote"];
		}
		if ($data["vote"] < $lastscore) {
			$lastscore = $data["vote"];
			$rank++;
		}
		echo $rank . " <a href=\"/".$data["url"]."\">".$data["text"] . "</a>  <img src=\"statics/face.png\"> " . $data["vote"] . "";
		echo '<form action="index.php" method="post"><input type="hidden" value="'.$data['url'].'" name="jaimepasca" /><button type="submit" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></button></input></form>';
		
	}
 echo '<a href="https://jaimepas.ca/hatelist.php?scroll=next&start=0">page suivante</a>
</div>
<script>
$(\'.scroll\').jscroll({

// Enable debug mode
debug: false,

// When set to true, triggers the loading of the next set of content automatically when the user scrolls to the bottom of the containing element. 
// When set to false, the required next link will trigger the loading of the next set of content when clicked.
autoTrigger: true,

// Set to an integer great than 0 to turn off autoTrigger of paging after the specified number of pages. 
// Requires autoTrigger to be true.
autoTriggerUntil: false,

// The HTML to show at the bottom of the content while loading the next set.
loadingHtml: \'<img src="loading.gif" alt="Loading" /> Loading...\', 

// A JavaScript function to run after the loadingHtml has been drawn.
loadingFunction: false,

// The distance from the bottom of the scrollable content at which to trigger the loading of the next set of content. 
padding: 20, 

// The selector to use for finding the link which contains the href pointing to the next set of content.
nextSelector: \'a.jscroll-next:last\', 

// A convenience selector for loading only part of the content in the response for the next set of content. 
contentSelector: \'li\',

// Optionally define a selector for your paging controls so that they will be hidden, 
// instead of just hiding the next page link.
pagingSelector: \'\',

// Optionally define a callback function to be called after a set of content has been loaded.
callback: false

});
</script>';
}

?>