<?php
$host = "localhost";
$dbname = "testDB";
$dsn = "mysql:host=localhost;dbname=testDB;charset=utf8";
$user = "root";
$password = "6265SQL";

// demarrer une session
session_start();

// Récupération de l'index actuel (depuis le formulaire ou initialisation à 0)
$index = isset($_SESSION['index']) ? (int)$_SESSION['index'] : 0;

try {
    $pdo = new
        PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $user,
            $password
        );
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    echo "Connexion à la base de données réussie !<br>";
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$stmt = $pdo->query("Select * FROM personne");
$personnes = $stmt->fetchAll(PDO::FETCH_ASSOC);
$personne = $personnes[$index];
$personneId = $personne['id'];
$total = count($personnes);

// Gestion des boutons
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["suivant"])) {
        $_SESSION['index'] = ($_SESSION['index'] + 1) % count($personnes);
    }
    if (isset($_POST["precedent"])) {
        $_SESSION['index'] = ($_SESSION['index'] - 1 + count($personnes)) % count($personnes);
    }
    // Insertion dans la base de donnée
    if (isset($_POST["ajouter"])) {
        $stmt = $pdo->prepare("INSERT INTO personne (id, nom, prenom, email) VALUES (?, ?, ?, ?)");

        $stmt->execute([
            $_POST["id"],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email']
        ]);
    }

    // suppresion
    if (isset($_POST['supprimer'])) {
        $stmt = $pdo->prepare("DELETE FROM personne WHERE id = ?");
        $stmt->execute([$_SESSION['index']]);
    }

    // modifier
    if (isset($_POST['modifier'])) {
        $stmt = $pdo->prepare("UPDATE personne SET nom = ?, prenom = ?, email = ? WHERE id = ?");
        $stmt->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $personneId
        ]);
    }
}

// Récupération des données de la personne actuelle
$index = isset($_SESSION['index']) ? (int)$_SESSION['index'] : 0;
$personne = $personnes[$index];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation dans un tableau</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Personne <?php echo $index + 1; ?> sur <?php echo count($personnes); ?></h2>
        <form method="POST">
            <label>Id</label>
            <input type="text" name="id" value="<?php echo $personne['id']; ?>">

            <label>Nom :</label>
            <input type="text" name="nom" value="<?php echo $personne['nom']; ?>">

            <label>Prénom :</label>
            <input type="text" name="prenom" value="<?php echo $personne['prenom']; ?>">

            <label>Email :</label>
            <input type="email" name="email" value="<?php echo $personne['email']; ?>"><br><br>

            <div class="buttons">
                <button type="submit" name="precedent">⬅ Précédent</button>
                <button type="submit" name="suivant">Suivant ➡</button><br><br>
            </div>
            <div class="buttons">
                <button type="submit" name="ajouter">Ajouter</button>
                <button type="submit" name="modifier">Modifier</button>
                <button type="submit" name="supprimer">Supprimer</button>
            </div>
        </form>
    </div>
</body>

</html>