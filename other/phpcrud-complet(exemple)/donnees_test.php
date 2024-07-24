<?php
include('connect.php');
$faker = Faker\Factory::create('fr_FR');
$faker->addProvider(new Faker\Provider\fr_FR\PhoneNumber($faker));
const NB_CONTACTS = 15;

// préparation de la requête sql
$sql = 'INSERT INTO contacts (nom, courriel, telephone, titre)
        VALUES (?, ?, ?, ?)';
$stmt = $pdo->prepare($sql);

for ($i = 0; $i < NB_CONTACTS; $i++) :
    $nom = $faker->name();
    $courriel = $faker->email();
    $telephone = "0" . random_int(1, 7) . $faker->phoneNumber07();
    $titre = $faker->randomDigit() % 2 == 0 ? "M." : "Mme";

    // insertion dans la base de données
    // en utilisant la requête préparée
    $stmt->execute([$nom, $courriel, $telephone, $titre]);

    // $pdo->lastInsertId() permet de récupérer l'id du nouveau contact
    // affichage brut
    echo 'insertion ', $pdo->lastInsertId() . " ", $nom . " ", $courriel . " ", $telephone . " ", $titre . " ", '<br>';
endfor;
?>
<br>
<a href="read.php">Lecture</a>