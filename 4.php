<!DOCTYPE html>
<html>

<head>
    <title>Formulaire PHP</title>
</head>

<body>
    <h1>Formulaire PHP</h1>
    <form method="POST" action="">
        <input type="text" name="nom" placeholder="Entrez votre nom">
        <input type="submit" value="Envoyer">
    </form>

    <?php
    echo "<br><br>Test Formulaire : <br>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        echo "Bonjour, " . htmlspecialchars($nom) . " !";
    }
    ?>

</body>

</html>