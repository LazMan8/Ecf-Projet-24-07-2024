
<body>
    <h1><?= $titreH1; ?></h1>
    <p><?= $paragraphe; ?></p>

    <!-- Afiche du matricule -->
    <p>Matricule : <?=$matricul;?></p>

    <!-- Affichage du nom -->
    <p>Nom : <?= $nom; ?></p>

    <!-- Affichage du prenom -->
     <p> Prenom : <?= $prenom ?></p>

    <!-- Affichage du role -->
    <p></p>
    
    <?php
    echo "<ul>";
        foreach($habilitations as $habilitation) {
            echo "<li>";
            echo $habilitation['application']->getNomAppli() . " ";
            echo $habilitation['application']->getbdAppli() . " ";
            echo $habilitation['role']->getIdRoleAppli() . " ";
            echo $habilitation['role']->getMdpRoleAppli() . " ";
            echo "</li>";
        }
        echo "</ul>";
    ?>
</body>