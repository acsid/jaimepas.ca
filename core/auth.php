      	  <?php

			foreach ($adapters as $name => $adapter) : 
				// print_r($adapter->getUserProfile()); 
				 
				 if ( !$database->has("account" , ["email" => $adapter->getUserProfile()->email]) ) {
					 if ( $name == "Facebook") {
						$database->insert("account",[
							"email" => $adapter->getUserProfile()->email,
							"Facebook" => $adapter->getUserProfile()->identifier
						]);
					 }
				if ( $name == "Twitter") {
						$database->insert("account",[
							"email" => $adapter->getUserProfile()->email,
							"Twiter" => $adapter->getUserProfile()->identifier
						]);
					 }
					 statsAddReg($database);
					$_SESSION['internalid'] = $database->id();
				 } else {
					  if ( $name == "Facebook") {
						$database->update("account",[
							"Facebook" => $adapter->getUserProfile()->identifier
						],[
							"email" => $adapter->getUserProfile()->email
						]);
					 }
				if ( $name == "Twitter") {
						$database->update("account",[
							"Twiter" => $adapter->getUserProfile()->identifier
						],[
							"email" => $adapter->getUserProfile()->email
						]);
					 }
					$data = $database->get("account" , ["id"], ["email" => $adapter->getUserProfile()->email ]);
					$_SESSION['internalid'] = $data["id"];
				 }
				 
				 	
            endforeach;
			header("Location: " . $conf['url']);

			?>