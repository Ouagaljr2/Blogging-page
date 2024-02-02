<?php 
$isPublish=true;
include_once("asserts/nav.php");?>

       <div id ="publication">
            <form id="form3" action="asserts/articles.php" method="post">

                <div id="info">
                    <div>
                        <label for="autorName"> autor name</label>
                        <input id= "idt" class="champs" type="text" name="autorName" placeholder="Entrer votre nom" />
                        <p>Error</p>
                    </div>

                    <div>
                        <label for="artName"></label>
                        <input id="nArt" class="champs" type="text" name="artName" placeholder="Donner un nom a votre article" />
                        <p>Error</p>
                    </div>
                </div>

                <div  id="contenu">
                    <label for="content"></label>
                    <textarea name="content" id="content" ></textarea>
                    <p>Error</p>
                </div>

                <button type="submit" id="champs4"> <?php echo $lang["artpublish"] ?> </button>
            </form>

        </div>


<?php include_once("asserts/footer.php");?>

<script src="script2.js"></script>

</body>
</html>