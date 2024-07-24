<?php
$title = 'Suppression';
include 'connect.php';
include 'head.php';

if (isset($_GET['id'])) :
    $id = intval($_GET['id']);
    $sql = 'DELETE FROM contacts WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 0) :
        echo "Contact #{$id} non trouvé.";
    else :
        echo "Contact #{$id} supprimé.";
    endif;
else :
    echo "Id non fourni";
endif;

include 'foot.php';
