<?php 

    try 
    {
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
		$bdd= new PDO('mysql:host=localhost:3308;dbname=pharmacie','root','',$pdo_options);
        //$bdd = new PDO('mysql:host=109.234.161.83;dbname=gvhc0539_boulangerie','gvhc0539','*Kjt!@mSA8w!');  
        $bdd->exec("SET CHARACTER SET utf8"); 
    }
    catch(Exception $e)
    {
        die('Erreur '.$e->getMessage());
    }
    
?>