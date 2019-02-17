<div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">5 derniers<h4>
          </div>
          <div class="card-body">
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
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">5 Pires choses</h4>
			 
          </div>
          <div class="card-body">
				<?PHP
				$datas = $database->select("sujet" , ["text","vote","date","url"],["LIMIT" => 5,"ORDER" => ["vote" => "DESC"],]);
				foreach($datas as $data)
				{
					echo "<p class=\"card-text\"><a href=\"/".$data["url"]."\">".$data["text"] . "</a> <img src=\"statics/face.png\"> " . $data["vote"] . "";
						echo '<form action="index.php" method="post"><input type="hidden" value="'.$data['url'].'" name="jaimepasca" /><button type="submit" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></button></form></p>';
				}
	
			?>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">5 Al&eacute;atoire</h4>
          </div>
          <div class="card-body">
			------------	
          </div>
        </div>
      </div>