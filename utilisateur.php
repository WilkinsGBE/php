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

if (isset($_GET["modifier"])) {
    $_SESSION["id"] = $_GET["id"];
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
        <h1>Liste d'utilisateur</h1>
        <p>Nombre d'utilisateur : <?php echo count($personnes); ?></p>

        <div class="label">
            <label for="" class="prenomlab">Prénom</label>
            <label for="" class="nomlab">Nom</label>
            <label for="" class="emaillab">Email</label>
            <label for="" class="modifierlab">Modifier cette ligne</label>
            <label for="" class="supprimerlab">Supprimer cette ligne</label>
        </div>

        <?php foreach ($personnes as $personne): ?>
            <form action="" method="GET">

                <label for="" class="id"><?php echo $personne['id'] ?></label>
                <input type="hidden" name="id" value="<?= $personne['id'] ?>">
                <div class="prenom">
                    <input type="text" name="prenom" value="<?= htmlspecialchars($personne['prenom']) ?>">
                </div>
                <div class="nom">
                    <input type="text" name="nom" value="<?= htmlspecialchars($personne['nom']) ?>" readonly>
                </div>
                <div class="email">
                    <input type="text" name="email" value="<?= htmlspecialchars($personne['email']) ?>" readonly>
                </div>
                <div class="modifier">
                    <button>
                        <a href="/modifier.php?id=<?= $personne['id']?>">Modifier</a>
                    </button>

                </div>
                <div class="supprimer">
                    <button>
                        <a href="/supprimer.php?id=<?= $personne['id'] ?>">Supprimer</a>
                    </button>
                </div>
            </form>
        <?php endforeach; ?>
        <div class="ajouter">
            <button>
                <a href="/ajouter.php">Ajouter</a>
            </button>
        </div>
    </div>
</body>

</html>