<?php
include 'connect.php';
$title = "Mise à jour";
include 'head.php';

$afficherFormulaire = false;
if (isset($_GET['id'])) :
    $id = intval($_GET['id']);
    $sql = 'SELECT * FROM contacts WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch();
    if (is_array($contact) and isset($contact['id']) and $contact['id'] == $id) :
        $afficherFormulaire = true;
    else :
        $msg = "Contact #{$id} non trouvé.";
    endif;

    if (!empty($_POST)) :
        if (isset($_POST['id']) and isset($_POST['nom']) and isset($_POST['courriel']) and isset($_POST['telephone']) and isset($_POST['titre'])) :

            if (intval($_POST['id']) === $id) :
                // on considère que les données sont valides
                // mise à jour de la base de données

                $nom = htmlspecialchars($_POST['nom']);
                $courriel = filter_input(INPUT_POST, 'courriel', FILTER_VALIDATE_EMAIL);
                $telephone = "0" . strval(intval($_POST['telephone']));
                $titre = htmlspecialchars($_POST['titre']);


                // TODO : vérification plus stricte
                //        vérifier la longueur du nom, du numéro de téléphone, etc.

                $sql = 'UPDATE contacts SET nom = ?, courriel = ?, telephone = ?, titre = ? WHERE id = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nom, $courriel, $telephone, $titre, $id]);
                if ($stmt->rowCount() == 1) :
                    $msg = "Mise à jour effectuée !";
                else :
                    $msg = "Échec de la mise à jour";
                endif;

                $msg = "Contact #{$id} mis à jour";
                $afficherFormulaire = false;
            else :
                $msg = "Erreur contact ids";
                $afficherFormulaire = false;
            endif;
        else :
            $msg = "Certaines données sont manquantes.";
            $afficherFormulaire = $afficherFormulaire && true;
        endif;
    else :
        $afficherFormulaire = $afficherFormulaire && true;
    endif;
else :
    $msg = "Id non fourni";
endif;
?>

<div class="content update">
    <?php if ($afficherFormulaire === true) : ?>
        <h2>Mise à jour Contact #<?= $contact['id'] ?></h2>
        <form action="update.php?id=<?= $contact['id'] ?>" method="post">
            <label for="id">ID</label>
            <label for="nom">Nom</label>
            <input type="text" required name="id" placeholder="1" readonly value="<?= $contact['id'] ?>" id="id">
            <input type="text" required name="nom" placeholder="Jean Dupond" value="<?= $contact['nom'] ?>" id="nom">
            <label for="courriel">Courriel</label>
            <label for="telephone">Téléphone</label>
            <input type="text" required name="courriel" placeholder="jeandupond@example.com" value="<?= $contact['courriel'] ?>" id="email">
            <input type="text" required name="telephone" placeholder="0102030405" value="<?= $contact['telephone'] ?>" id="telephone">
            <label for="title">Titre</label>
            <label for="created">Créé le</label>
            <input type="text" required name="titre" placeholder="M." value="<?= $contact['titre'] ?>" id="titre">
            <input type="datetime-local" required readonly name="created" value="<?= date('Y-m-d\TH:i', strtotime($contact['created'])) ?>" id="created">
            <input type="submit" value="Mettre à jour">
        </form>
    <?php endif; ?>
    <?php if (isset($msg)) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>

<?php
include 'foot.php';
?>