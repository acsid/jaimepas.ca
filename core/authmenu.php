<?PHP

	if ($adapters) {
	echo '
	
	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://jaimepas.ca/me_faire_pointer" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
          
	';
	foreach ($adapters as $name => $adapter) : 
		print("<a href=\"");
		print $HAconfig['callback'] . "?logout={$name}";
		print("\">Log Out</a>");
	endforeach;
		echo '  </div>
          </li>
		  ';
	
} else {
	
	echo '
	
	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://jaimepas.ca/me_faire_pointer" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
          
	';
	
 foreach ($hybridauth->getProviders() as $name) : 
         if (!isset($adapters[$name])) : 
             echo' <a  class="dropdown-item"  href="'. $HAconfig['callback'] . '?provider='.$name.'">'.$name.'</a>';
                    
       endif; 
    endforeach; 
	echo '  </div>
          </li>
		  ';
}

?>