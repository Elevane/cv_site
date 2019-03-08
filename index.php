
<!-- 
-Bastien AUBRY
--1ere année ITSTART IMIE 
---HTML-CSS-JS-PHP
-->


<?php require_once('headerIndex.php'); // header de la page principale ?> 
        
        
    <!----------------------------------------------------------------->
    <!------------------------ACCEUIL ET HEADER------------------------>
    <!----------------------------------------------------------------->
        
        <section id="acceuil">


            <h1>developpeur web junior</h1><!-- titre de la partie-->

            <div class ="div_xxx"><!-- deux textes juste en dessous le titre de la partie qui decrivent légerment le contenu -->
                <p>xxx</p>
                <p >je recherche une entreprise pour un stage de trois à cinq mois</p>
            </div>

            <div class="your-class"  id="acceuil_img_main">
                <img src="img/slider_1.jpg" alt="image_acceuil"/> <!-- place pour le coarouseel plus tard -->
                <img src="img/slider_2.jpg" alt="image_acceuil" />
                <img src="img/plage.jpg" alt="image_acceuil" />
                <img src="img/foret.jpg" alt="image_acceuil"/>
            </div>
            <p class="section_acceuil_p">"bonjour, je suis aubry Bastien,</p>
            <p class="section_acceuil_p">je vous souhaite la bienvenue sur mon site cv"</p>

        </section>

    <!----------------------------------------------------------------->
    <!-----------------------A PROPOS---------------------------------->
    <!----------------------------------------------------------------->

        
        <section id="apropos">
            <h1>a propos de moi</h1><!-- titre de la partie-->

            <div class="div_xxx"><!-- deux textes juste en dessous le titre de la partie qui decrivent légerment le contenu -->
                <p>XXX</p>
                <p>je suis developpeur concepteur web junior</p>
            </div>

            <div id="divapropos">
            <?php require_once('selectApropos.php');  // script BDD qui apporte les données ?>
            </div>
        </section>

    <!----------------------------------------------------------------->
    <!---------------------PORTFOLIO----------------------------------->
    <!----------------------------------------------------------------->

         <section id="portfolio">
            <h1>portfolio</h1><!-- titre de la partie-->

            <div class="div_xxx"><!-- deux textes juste en dessous le titre de la partie qui decrivent légerment le contenu -->
                <p>xxx</p>
                <p>Voici mes différents projets</p>
            </div>


            <div id="divbutton"><!-- groupe de petits boutons || projet js de tri ||-->
                <button>design</button>
                <button>integration</button>
                <button>java</button>
                <button>css</button>
                <button>javascript</button>
                <button>python</button>
            </div>

            <section id="sectionport">
                <?php require_once('selectPortfolio.php'); // script BDD qui apporte les données ?> 
            </section>
        </section>

    <!----------------------------------------------------------------->
    <!-----------------------MON BLOG---------------------------------->
    <!----------------------------------------------------------------->


        <section id="mon_blog">

            <h1>mon blog</h1><!-- titre de la partie-->
            <div class="div_xxx"><!-- deux textes juste en dessous le titre de la partie qui decrivent légerment le contenu -->
                <p>xxx</p>
                <p>articles personnels et professionnels</p>
            </div>

            <?php require_once('selectMonBlog.php');// script BDD qui apporte les données  ?>

        </section>

    <!----------------------------------------------------------------->
    <!------------------------ME CONTACTER----------------------------->
    <!----------------------------------------------------------------->


        <section id="me_contacter">
            <h1>me contacter</h1><!-- titre de la partie-->

            <div class="div_xxx"><!-- deux textes juste en dessous le titre de la partie qui decrivent légerment le contenu -->
                <p>xxx</p>
                <p>je vous répondrais avec grand plaisir</p>
            </div>

            <form action="ajouterMail.php" method="post"> <!-- formulaire de contact, envoies les données vers un script php qui incorpore les données dans la bdd-->

                <label for="nom"></label>
                <input type="text" name="nom" placeholder="nom"/><!-- champ du nom -->

                <label for="mail"></label>
                <input type="email" name="mail" placeholder="email"/><!-- champ du prénom -->

                <label for="objet"></label>
                <input type="text" name="objet" placeholder="objet"/><!-- champ de l'objet du mail -->

                <label for="text"></label>
                <textarea name="text" placeholder="votre message" id="commentaire"></textarea><!-- champ du texte -->


                <label for="btn"></label>
                <input type="submit" name="btn" value="envoyer message"/><!--button qui déclanche le formulaire d'envoi -->
            </form>

            <h4>Retrouvez-moi sur les réseaux sociaux</h4><!-- image de Réseaux sociaux -->
            <img src="img/RS.png" alt="rs"/>

        </section>

        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script> <!-- on import le jquery nécessaire pour certaines opération dynamique comme le carroussel-->
        <script type="text/javascript" src="slick/slick.min.js"></script><!---->
        <script type="text/javascript" src="js/script.js"></script><!---->
        <script src="js/to-top.js"></script>
    </body>
</html>
        
  