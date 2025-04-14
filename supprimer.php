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

// suppresion
if (isset($_POST['supprimer'])) {
    $stmt = $pdo->prepare("DELETE FROM personne WHERE id = ?");
    $stmt->execute([$_SESSION['index']]);
}
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
        <h1>Supprimer un utilisateur</h1>
        <p>Nombre d'utilisateur : <?php echo count($personnes); ?></p>

        <div class="label">
            <label for="" class="prenomlab">Prénom</label>
            <label for="" class="nomlab">Nom</label>
            <label for="" class="emaillab">Email</label>
            <label for="" class="modifierlab">Modifier cette ligne</label>
            <label for="" class="supprimerlab">Supprimer cette ligne</label>
        </div>

        <form action="traitement.php" method="POST">

            <input type="" name="id" value="<?= $personne['id'] ?>">
            <div class="prenom">
                <input type="text" name="prenom" value="<?= htmlspecialchars($personne['prenom']) ?>">
            </div>
            <div class="nom">
                <input type="text" name="nom" value="<?= htmlspecialchars($personne['nom']) ?>" readonly>
            </div>
            <div class="email">
                <input type="text" name="email" value="<?= htmlspecialchars($personne['email']) ?>" readonly>
            </div>
            <button name="ajouter">Supprimer</button>
        </form>
    </div>
</body>

</html>