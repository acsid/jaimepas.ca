<?PHP

if ($posturl == "index.php") {
	 header("Location: " . $conf['url']);
} 
	$getdata = $database->get("sujet", ["text" ,"vote", "date","url","id"], [
	"url" => $posturl
]);
if ( !$getdata ) {
header("Location: " . $conf['url']);
}
	echo '<main role="main" class="container">
  
      <div class="jaimepascamainform">
        <h1>J\'aime pas ça ';
	
	

	
	print(strip_tags($getdata['text']));
	$pagetitle = strip_tags($getdata['text']);
	echo '</h1>
		pas aimer de ';
	print($getdata['vote']);
	echo ' personne(s)';
	//check si c deja dans liste du user
	
	if($_SESSION['internalid'] != -1) {
		if ($database->has("list",[
		"account" => $_SESSION['internalid'],
		"sujet" => $getdata["id"]
		])) {
		echo '<br> Vous n\'aimez pas ça';
		}
	else {
		echo '<form action="index.php" method="post"><input type="hidden" value="'.$getdata['url'].'" name="jaimepasca" /><button type="submit" class="btn btn-primary"><i class="fas fa-thumbs-down"></i> j\'aime pas non plus</button></input></form></br>';
	}
		echo "<br>ajout: " . $getdata['date'];
	} else {
		if ( isset($_SESSION[$posturl])) {
			echo '<br> Vous n\'aimez pas ça';
		}
		else {
					echo '<form action="index.php" method="post"><input type="hidden" value="'.$getdata['url'].'" name="jaimepasca" /><button type="submit" class="btn btn-primary"><i class="fas fa-thumbs-down"></i> j\'aime pas non plus</button></form></br>';

			
		}
		
	}
	
	//print_r($getdata);
	//share buttons
	//4uz//4uz
	//echo '<button type="submit" class="btn btn-primary" data-clipboard-text="1"> <img src=\"statics/face.png\"> </i></button>';
	echo "<br>url ninja: 4uz.net/" . toBase($getdata['id']);
?>

      </div>
    </main>