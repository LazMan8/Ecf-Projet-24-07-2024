<?php
include 'connect.php';
$title = "Insertion";
include 'head.php';

if (!empty($_POST)) :
    if (isset($_POST['nom']) and isset($_POST['courriel']) and isset($_POST['telephone']) and isset($_POST['titre'])) :

        // on considère que les données sont valides
        // insertion des données dans la base de données

        $nom = htmlspecialchars($_POST['nom']);
        $courriel = filter_input(INPUT_POST, 'courriel', FILTER_VALIDATE_EMAIL);
        $telephone = "0" . strval(intval($_POST['telephone']));
        $titre = htmlspecialchars($_POST['titre']);
        $created = $_POST['created'];

        // TODO : vérification plus stricte
        //        vérifier la longueur du nom, du numéro de téléphone, etc.

        $sql = 'INSERT INTO contacts (nom, courriel, telephone, titre, created)
            VALUES (?, ?, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $courriel, $telephone, $titre, $created]);


        $msg = "Nouveau contact créé, id = {$pdo->lastInsertId()}";
        $afficherFormulaire = false;
    else :
        $msg = "Certaines données sont manquantes.";
        $afficherFormulaire = true;
    endif;
else :
    $afficherFormulaire = true;
endif;

?>

<h2>Création Nouveau Contact</h2>

<div class="content update">
    <?php if ($afficherFormulaire) : ?>
        <form action="create.php" method="post">
            <label for="id">ID</label>
            <label for="nom">Nom</label>
            <input type="text" name="id" placeholder="1" readonly value="(auto)" id="id">
            <input type="text" required name="nom" placeholder="Jean Dupond" id="nom">
            <label for="courriel">Courriel</label>
            <label for="telephone">Téléphone</label>
            <input type="text" required name="courriel" placeholder="jeandupond@example.com" id="email">
            <input type="text" required name="telephone" placeholder="0102030405" id="telephone">
            <label for="titre">Titre</label>
            <label for="created">Créé le</label>
            <input type="text" required name="titre" placeholder="M." id="titre">
            <input type="datetime-local" name="created" id="created">
            <input type="submit" value="Créer">
        </form>
    <?php endif; ?>
    <?php if (isset($msg)) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>
<script>
    window.addEventListener("load", function() {
        // récupération de la date
        // en tenant compte du fuseau horaire
        let now = new Date();
        let offset = now.getTimezoneOffset() * 60000;
        let dateTZ = new Date(now.getTime() - offset);

        // formatage de la date, à la minute près
        // (on retire les secondes et les millisecondees)
        let dateMinute = dateTZ.toISOString().substring(0, 16);

        // ajustemenet de la valeur par défaut dans le formulaire
        let champDate = document.getElementById("created");
        champDate.value = dateMinute;
    });
</script>
<?php
include 'foot.php';
?>