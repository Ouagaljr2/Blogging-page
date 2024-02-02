<?php
    session_start();
    $pdo = new PDO('sqlite:' . dirname(__FILE__) . '/database.db');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);

        $username = strtolower($username);
        
        $check = $pdo->query("SELECT e_mail,creatpwd FROM users WHERE e_mail='{$username}'")
                     ->fetch();
  




        if(count($check) > 0){
            if(filter_var($username,FILTER_VALIDATE_EMAIL)){
                if( password_verify( $password, $check['creatpwd'])){
                    header('Location: http://localhost:8080?login_err=success&status=true') ;
                    die();
                }else {header('Location: http://localhost:8080?login_err=password'); die();}

            }header('Location: http://localhost:8080?login_err=username');
        }else { header('Location: http://localhost:8080?login_err=notfound'); die();}
    }else { header('Location: http://localhost:8080'); die(); }