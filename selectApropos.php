  <?php 
    require_once('bdco.php');
    $req = "select imgpath, h2, h3, p from apropos;";
    $resultat = $maConnexion->query($req);
    while($contenu=$resultat->fetchObject())
    {
        echo "<article><img src='".$contenu->imgpath."' alt='img'";
        echo "<h2>".$contenu->h2."</h2>";
        echo "<h3>".$contenu->h3."</h3>";
        echo "<p>".$contenu->p."</p>";
        echo '</form></article>';
    }
?>