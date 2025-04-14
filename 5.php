<!DOCTYPE html>
<html>

<head>
    <title>
        Formulaire d'addition
    </title>
</head>

<body>
    <h1>Formulaire d'addition</h1>
    <form method="POST">
        <label for="1e">Premier nombre</label><br>
        <input type="number" placeholder="12" name="nombre1"><br><br>
        <select name="action" id="">
            <!-- Les valeurs sont importantes vue que PHP les utilise pour la methode -->
            <option value="addition">addition</option>
            <option value="soustraction">soustraction</option>
            <option value="multiplication">multilplication</option>
            <option value="division">division</option>
        </select><br><br>
        <label for="2e">Deuxieme nombre</label><br>
        <input type="number" placeholder="24" name="nombre2"><br><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre1 = $_POST["nombre1"];
        $nombre2 = $_POST["nombre2"];
        $methode = $_POST["action"];

        if ($methode == "addition") {
            $total = $nombre1 + $nombre2;
        } else if ($methode == "soustraction") {
            $total = $nombre1 - $nombre2;
        } else if ($methode == "multiplication") {
            $total = $nombre1 * $nombre2;
        } else {
            $total = $nombre1 / $nombre2;
        }

        echo "<br><br> Le resultat est = ", $total;
    }
    ?>

</body>

</html>