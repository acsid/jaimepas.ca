<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Les 5 derniers</h5>


<?PHP
	$datas = $database->select("sujet" , ["text","vote","date","url"],["LIMIT" => 5,"ORDER" => ["id" => "DESC"],]);
foreach($datas as $data)
{
	echo "<p class=\"card-text\"><a href=\"/".$data["url"]."\">".$data["text"] . "</a> <img src=\"statics/face.png\"> " . $data["vote"] . "";
		echo '<form action="index.php" method="post"><input type="hidden" value="'.$data['url'].'" name="jaimepasca" /><button type="submit" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></button></form></p>';
}
	
	?> 
  </div>
</div>