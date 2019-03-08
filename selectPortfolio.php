 <?php 
    require_once('bdco.php');
    $req = "select imgpath, imga,bound, p from portfolio;";
    $resultat = $maConnexion->query($req);
    while($contenu=$resultat->fetchObject())
    {
        echo "<article><img src='".$contenu->imgpath."' alt='img' class='imgPF'>";
        echo "<a href='".$contenu->bound."'><img src='".$contenu->imga."'alt='icon' class='imga'/><a>";
        echo "<p>".$contenu->p."</p></article>";

    }
?>