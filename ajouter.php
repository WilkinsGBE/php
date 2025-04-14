<?php
$host = "localhost";
$dbname = "testDB";
$dsn = "mysql:host=localhost;dbname=testDB;charset=utf8";
$user = "root";
$password = "6265SQL";

session_start();

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
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$stmt = $pdo->query("Select * FROM personne");
$personnes = $stmt->fetchAll(PDO::FETCH_ASSOC);
$personne = $personnes[$index];
$personneId = $personne['id'];
$total = count($personnes);

if (isset($_POST["ajouter"])) {
    $stmt = $pdo->prepare("INSERT INTO personne (id, nom, prenom, email) VALUES (?, ?, ?, ?)");

    $stmt->execute([
        $_POST["id"],
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email']
    ]);
}

// Récupération des données de la personne actuelle
$index = isset($_SESSION['index']) ? (int)$_SESSION['index'] : 0;
$personne = $personnes[$index];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Liste d'utilisateur</title>
    <link rel="stylesheet" href="/utilisateur.css">
</head>

<body>
    <nav>
        <a href="/utilisateur.php">Liste d'utilisateur</a>
        <a href="/ajouter.php">Ajouter</a>
        <a href="/modifier.php">Modifier</a>
        <a href="/supprimer.php">Supprimer</a>
    </nav>
    <div id="utilisateur">
        <h1>Ajouter un utilisateur</h1>

        <div class="label">
            <label for="" class="prenomlab">Id</label>
            <label for="" class="prenomlab">Prénom</label>
            <label for="" class="nomlab">Nom</label>
            <label for="" class="emaillab">Email</label>
        </div>

        <form action="" method="POST">

            <div class="prenom">
                <input type="number" name="id">
            </div>
            <div class="prenom">
                <input type="text" name="prenom">
            </div>
            <div class="nom">
                <input type="text" name="nom">
            </div>
            <div class="email">
                <input type="text" name="email">
            </div>
            <button type="submit" name="ajouter">Ajouter</button>

        </form>
    </div>
</body>

</html>