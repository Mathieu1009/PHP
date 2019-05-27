<?php

    try { 
 		$bdd = new PDO('mysql:host=localhost:3307;dbname=tpspawn','root',''); 
	} 
	catch (PDOException $e) {
 		echo $e->getMessage();
	}
    
?>