<?php include_once("langueconfig.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Mon site</title>
</head>
<body>
		<nav id="navigation">
            <div>
                <a  href="index.php?lang=fr"><img class="langue" src="../images/france-gee88a9ef9_640.png "alt="FR"></a>
                <a  href="index.php?lang=en"><img class="langue" src="../images/united-g464e493aa_640.png" alt="EN"></a>
            </div>
            <ul id="nav">
			    <li id="acceuil"    class=" barnav"><a href="index.php"> <?php echo $lang["home"]?> </a></li>
                <?php
                if(!$isPublish):
                ?>

			    <li id="publier"    class=" barnav"><a href="publier.php"> <?php echo $lang["publier"]?> </a></li>
			    <li id="connect"    class=" barnav"><a href="#"> <?php echo $lang["connexion"]?> </a></li>
                <?php
                endif;
                ?>


                <?php 
                    if(isset($_GET['status']))
                    {
                        $err = htmlspecialchars($_GET['status']);

                        switch($err)
                        {
                            case 'true':
                            ?>
			                   <li id= "statu" > <?php echo $lang["trueStatus"]?> </li>
                                <li ><a href="asserts/deconnexion.php"> <?php echo $lang["deconnecte"]?> </a></li>
                            <?php
                            break;

                            case 'false' :
                            ?>
			                    <li > <?php echo $lang["falsStatus"]?> </li>
             
                            <?php
                            break;

                        }
                    }
                 ?>
                
		    </ul>
        </nav>
	