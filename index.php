<?php include_once("asserts/nav.php");?>
    <header>
        <div id= "slogan">
            <div class="monslogan">

                <p> <?php echo $lang["slog1"]?>  </p>
                <p> <?php echo $lang["slog2"]?>  </p>
                <p> <?php echo $lang["slog3"]?>  </p>
            </div>
            
            <div class="monslogan">
                
            </div>
       
        </div>

        <div id="connexion">
            <!-- traitement des erreur-->

        <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="Errors">
                                <strong>  <?php echo $lang["Errpass"]?></strong>
                            </div>
                        <?php
                        break;

                        case 'username':
                        ?>
                            <div class="Errors">
                                <strong>  <?php echo $lang["Errmail"]?> </strong> 
                            </div>
                        <?php
                        break;

                        case 'notfound':
                        ?>
                            <div class="Errors">
                                <strong> <?php echo $lang["Errcompte"]?> </strong>
                            </div>
                        <?php
                        break;
                    }
                }
        ?>
            
            <form id="form1" action="asserts/connexion.php" method="post">
                <div>
                    <label for="username">Nom d'utilisateur</label>
                    <input class="champs" type="email" id="username" name="username" placeholder="Votre adress e-mail" />
                    <p>Error</p>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input class="champs"  type="password" id="password" name="password" placeholder="Votre mot de passe" />
                    <p>Error</p>
                </div>
                <button class="champs" id="champ1" type ="submit"> <?php echo $lang["se_connecter"]?> </button>
            </form>
            <button class="champs" id="champs2"> <?php echo $lang["creer"]?> </button>
        </div>

        <div id="creercompte">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div id="success">
                                <strong> <?php echo $lang["success"]?> </strong> 
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="Errors">
                                <strong><?php echo $lang["ErrmailV"]?></strong> 
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="Errors">
                                <strong><?php echo $lang["mailT"]?></strong> 
                            </div>
                        <?php 
                        break;

                        case 'name_length':
                        ?>
                            <div class="Errors">
                                <strong> <?php echo $lang["nameT"]?> </strong>
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="Errors">
                                <strong> <?php echo $lang["already"]?> </strong> 
                            </div>
                        <?php 

                    }
                }
                ?>
            
            <form  id="form2" action="asserts/inscription.php" method="post">
                <div>
                    <label for="firstName">Nom</label>
                    <input class="champs" type="text" id="fname" name="firstName" placeholder="Nom" />
                    <p>Error</p>
                </div>
            <div>
                <label for="lastName">Prenom</label>
                <input class="champs" type="text" id="lname" name="lastName" placeholder="Prenom" />
                <p>Error</p>
            </div>
            <div>
                <label for="creatpwd">Mot de passe</label>
                <input class="champs"  type="password" id="creatpassword" name="creatpwd" placeholder="Mot de passe unique de connexion" />
                <p>Error</p>

            </div>
            <div>
                <label for="e_mail">Adresse mail</label>
                <input class="champs"  type="email" id="mail" name="e_mail" placeholder="Votre adresse mail" />
                <p>Error</p>
            </div>
            <div>
                <label for="bday">date de naissance</label>
                <input class="champs" type="date" id="bday" name="bday"  placeholder="Date de naissance">
                <p>Error</p>
            </div>
                <button type="submit" class="champs" id="champs3"> <?php echo $lang["s'inscrire"]?> </button>

            </form>
        </div>

        <img id="image1" src="images/galaxy-3608029_1920.jpg" alt=" le cosmos des articles">

    </header>

    <section id="les_articles">

     

    </section>
    <button id="voirPlus" > <?php echo $lang["plus"] ?> </button>


    <script src="ajax.js"></script>
    <script src="script.js"></script>

<?php include_once("asserts/footer.php");?>




    

