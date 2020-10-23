<?php

include("requetes/connectionBDD.php");

if (isset($_SESSION['siBienInscrit'])) {
    $siBienInscrit = true;
} else {
    $siBienInscrit = false;
}

$_SESSION["modeInscription"] = true;

if (isset($_POST['nouvelUtilisateur']) &&  isset($_POST['nouveauMotDePasse']) &&    isset($_POST['nouveauMotDePasseConfirme'])) {

    $nouvelUtilisateur = $_POST['nouvelUtilisateur'];
    $nouveauMotDePasse = $_POST['nouveauMotDePasse'];
    $nouveauMotDePasseConfirme = $_POST['nouveauMotDePasseConfirme'];

    $salt = "ncejnjcen872%$";
    $motDePasseCrypte = md5($nouveauMotDePasse);

    $motDePasseFinal = $motDePasseCrypte.$salt;

    $motDePasseCrypteConfirme = md5($nouveauMotDePasseConfirme);
    $motDePasseFinalConfirme = $motDePasseCrypteConfirme.$salt;

    if ($nouvelUtilisateur != "" && $motDePasseFinal != "" && $motDePasseFinalConfirme != "") {

        if ($motDePasseFinal == $motDePasseFinalConfirme) {
            $maRequeteDeCerificationDeDisponibilite = "SELECT * FROM `utilisateurs` WHERE `utilisateurs`.`nom` ='" . $nouvelUtilisateur . "'";
            if ($retourDeMaRequete = mysqli_query($maConnection, $maRequeteDeCerificationDeDisponibilite)) {
                $monResultat = mysqli_fetch_array($retourDeMaRequete);
                if ($monResultat) {
                    echo "l'utilisateur existe deja";
                } else {
                    $maRequetteAjoutNouvelUtilisateur = "INSERT INTO `utilisateurs`(`nom`,`motDePasse`) VALUES ('" . $nouvelUtilisateur . "','" . $motDePasseFinal . "')";
                    if ($reponseRequete = mysqli_query($maConnection, $maRequetteAjoutNouvelUtilisateur)) {
                        echo 'ajout nouvel utilisateur ok ';
                        $siBienInscrit = true;
                        $_SESSION['siBienInscrit'] = true;
                    } else {
                        echo 'marche pas';
                    }
                }
            }
        } else {
            echo 'Les deux mots de passes doivent être identiques';
        }
    } else {
        echo 'les trois champs sont requis';
    }
} else {
}

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php

            if ($siBienInscrit) { 
                echo "<h3>Le contenu qu'on veut voir si un compte est bien créé </h3>";
                echo "<h2> Bravo " . $nouvelUtilisateur . " tu t'es bien inscrit </h2>";

                echo "<a href='http://localhost/mon%20projet/mapagedirection.php'> Revenir à l'accueil </a>";

                session_unset();
            } else { 
                echo "<form method='POST'>
					<div class='form-group'>
						<label for='exampleInputEmail1'>Nom d'utilisateur</label>
						<input required name='nouvelUtilisateur' type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Entrer un nom d' utilisateur'>
					</div>
					<div class='form-group'>
						<label for='exampleInputPassword1'>Mot de passe</label>
						<input required name='nouveauMotDePasse' type='password' class='form-control' id='exampleInputPassword1' placeholder='Entrer un mot de passe'>
					</div>
					<div class='form-group'>
						<label for='exampleInputPassword1'>Confirmer le mot de passe</label>
						<input required name='nouveauMotDePasseConfirme' type='password' class='form-control' id='exampleInputPassword1' placeholder='Confirmer le mot de passe'>
					</div>
					<button type='submit' class='btn btn-primary'>Envoyer</button>
				</form>";
            }
            ?>
        </div>
    </div>
</div>