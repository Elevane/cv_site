<?php
    require_once('bdco.php');
    $req = "select imgpath, h3, h4, monblog_id, p from monblog;";
    $resultat = $maConnexion->query($req);
    while($contenu=$resultat->fetchObject())
    {
        echo "<article><img src='".$contenu->imgpath."' alt='img' class='boite_blog'>";
        echo "<section><h3>".$contenu->h3."</h3>";
        echo "<h4>".$contenu->h4."</h4>";
        echo "<p>".$contenu->p."</p></section></article>";
}?>