<?php
include('connect.php');
$title = "Lire";
include('head.php');

$sql = 'SELECT COUNT(*) FROM contacts';
$num_contacts = $pdo->query($sql)->fetchColumn();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;
$sql = 'SELECT * FROM contacts ORDER BY id LIMIT :current_page, :record_per_page';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':current_page', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll();
?>
<div class="content read">
    <a href="create.php" class="create-contact">Créer un Contact</a>

    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Courriel</td>
                <td>Téléphone</td>
                <td>Titre</td>
                <td>Créé le</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?= $contact['id'] ?></td>
                    <td><?= $contact['nom'] ?></td>
                    <td><?= $contact['courriel'] ?></td>
                    <td><?= $contact['telephone'] ?></td>
                    <td><?= $contact['titre'] ?></td>
                    <td><?= $contact['created'] ?></td>
                    <td class="actions">
                        <a href="update.php?id=<?= $contact['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="delete.php?id=<?= $contact['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php if ($page > 1) : ?>
            <a href="read.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page * $records_per_page < $num_contacts) : ?>
            <a href="read.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>
<?php
include('foot.php');
