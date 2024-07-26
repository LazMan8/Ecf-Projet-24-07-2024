

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title><?= $_GET['page'] ?></title>
</head>
<header>
        <?php
        if (isset($_SESSION['id'])) 
        {
            ?>
            <ul>
                <li>
                <a href="index.php?page=deconnexion">Se déconnecter</a>
                </li>
            </ul>
            <?php
        } 
            ?>
</header>
</html>