<?php
    $pdo = new PDO('sqlite:' . dirname(__FILE__) . '/database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->query('CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        firstName VARCHAR(255) NOT NULL,
        lastName VARCHAR(255) NOT NULL,
        e_mail VARCHAR(255) NOT NULL,
        bday VARCHAR(255) NOT NULL,
        creatpwd VARCHAR(255) NOT NULL 
    )');


    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['e_mail']) && !empty($_POST['bday']) && !empty($_POST['creatpwd']))
    {

        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $e_mail = htmlspecialchars($_POST['e_mail']);
        $bday = htmlspecialchars($_POST['bday']);
        $creatpwd = htmlspecialchars($_POST['creatpwd']);

        $e_mail = strtolower($e_mail); 

        // On vérifie si l'utilisateur existe
        $check = $pdo->query("SELECT e_mail FROM users WHERE e_mail =' {$e_mail}'")
                             ->fetchAll();


        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if(count($check)==0){ 
            if(strlen($firstName) <= 100){ 
                if(strlen($e_mail) <= 100){ 
                    if(filter_var($e_mail, FILTER_VALIDATE_EMAIL)){ 

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $creatpwd = password_hash($creatpwd, PASSWORD_BCRYPT, $cost);

                            // On insère dans la base de données
                            $statement = $pdo->prepare('INSERT INTO users (firstName,lastName,e_mail,bday,creatpwd) VALUES (:firstName,:lastName,:e_mail,:bday,:creatpwd)');
                            $statement->bindValue(':firstName', $firstName);
                            $statement->bindValue(':lastName', $lastName);
                            $statement->bindValue(':e_mail', $e_mail);
                            $statement->bindValue(':bday', $bday);
                            $statement->bindValue(':creatpwd', $creatpwd);
                            $statement->execute();

                            // On redirige avec le message de succès
                            header('Location:http://localhost:8080?reg_err=success');
                            die();
                    }else{ header('Location: http://localhost:8080?reg_err=email'); die();}
                }else{ header('Location: http://localhost:8080?reg_err=email_length'); die();}
            }else{ header('Location: http://localhost:8080?reg_err=name_length'); die();}
        }else{ header('Location: http://localhost:8080?reg_err=already'); die();}
    }
